<?php

require "../../model/db/singletonDB.php";
require "../../model/reports/failureReport.crud.php";
require "../../model/users/user.crud.php";
require "../../model/equipement/equipement.crud.php";


$page = $_GET['page'];

if (isset($_GET['status']) && !empty($_GET['status'])) {
    if ($_GET['status'] == 'in progress') {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $result = FailureReportCRUD::searchProgressByOperatorIdDate($search, $conn);
        } else if (isset($_GET['sort']) && !empty($_GET['sort'])) {
            $sort = $_GET['sort'];
            $result = FailureReportCRUD::sortByOperatorId($sort, $conn);
        } else {
            $result = FailureReportCRUD::getAllReportsProgress($conn);
        }
        $fixed = false;
    } else if ($_GET['status'] == 'fixed') {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $result = FailureReportCRUD::searchFixedByOperatorIdDate($search, $conn);
        } else if (isset($_GET['sort']) && !empty($_GET['sort'])) {
            $sort = $_GET['sort'];
            $result = FailureReportCRUD::sortFixedByOperatorId($sort, $conn);
        } else {
            $result = FailureReportCRUD::getAllReportsFixed($conn);
        }
        $fixed = true;
    }
}
$status = $result[0];
$totalPages = $result[1];
$msg = $result[2];



if (!$status || $status == []) {
    $allReports = [];
} else {
    $allReports = [];
    foreach ($status as $failureReport) {
        $userById = UserCRUD::getById($failureReport['operator_id'], $conn);
        $user = new User(
            $userById['ID'],
            $userById['username'],
            $userById['firstName'],
            $userById['lastName'],
            $userById['age'],
            $userById['phone'],
            $userById['password'],
            $userById['email'],
            $userById['type']
        );

        $equipementById = EquipementCRUD::getById($failureReport['equipement_id'], $conn);
        $equipement = new Equipement(
            $equipementById['ID'],
            $equipementById['name'],
            $equipementById['model'],
            $equipementById['manufactureDate'],
            $equipementById['serialNumber'],
            $equipementById['process']
        );
        if ($failureReport['status'] == 'in progress') {
            $status = false;
        } else {
            $status = true;
        }
        $allReports[] = new FailureReport($failureReport['ID'], $user, $equipement, $failureReport['description'], $failureReport['report_date'], $failureReport['fixed_date'], $status);
    }
}

$output = '<table class="table table-sm">
<thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>Report ID</th>
        <th>Operator ID</th>
        <th>Operator Name</th>
        <th>Equipement ID</th>
        <th>Equipement Name</th>
        <th>Process</th>
        <th>Failure Description</th>
        <th>Report Date</th>';
if (!$fixed) {
    $output .= '<th>Status</th>';
} else {
    $output .= '<th>Fixed Date</th>';
}
$output .= '
    </tr>
</thead>
<tbody>';
if ($allReports == []) {
    $output .= '<td colspan="10" class="bg-light text-muted">' . $msg . '</td>';
} else {
    foreach ($allReports as $index => $failureReport) :
        $id = $failureReport->getId();
        $userId = $failureReport->getUser()->getId();
        $userFirstName = $failureReport->getUser()->getFirstName();
        $userLastName = $failureReport->getUser()->getLastName();
        $eqId = $failureReport->getEquipement()->getId();
        $eqName = $failureReport->getEquipement()->getName();
        $eqModel = $failureReport->getEquipement()->getModel();
        $eqProcess = $failureReport->getEquipement()->getProcess();
        $description = $failureReport->getDescription();
        $reportDate = $failureReport->getReportDate();
        $fixedDate = $failureReport->getFixedDate();
        $status = $failureReport->getStatus();

        $output .= '
        <tr class="table-secondary">
                    <td class="bg-dark text-white">' . ($index += ($page * 8) - 7) . '</td>
                    <td>' . $id . '</td>
                    <td>' . $userId . '</td>
                    <td>' . $userFirstName . ' ' . $userLastName . '</td>
                    <td>' . $eqId . '</td>
                    <td>' . $eqName . '</td>
                    <td>' . $eqProcess . '</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal' . $id . '">
                            Description
                        </button>
                        <div class="modal fade" id="modal' . $id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Description <b>' . $eqName . '</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-justify">' . $description . '</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>' . $reportDate . '</td>';
        if (!$fixed) {
            $output .= '<td>
                        <form method="POST" class="changeReportStatusForm">
                            <div class="form-check">
                                <input type="hidden" name="failureId" value="' . $id . '">
                                <button type="submit" class="btn btn-success pl-5 pr-5" name="submitFix">Fix</button>
                            </div>
                        </form>
                        </td>
            </tr>';
        } else {
            $output .= '<td>' . $fixedDate . '</td></tr>';
        }

    endforeach;
}

$output .= '
</tbody>
</table>';
$output2 = '';
if (!$fixed) {
    $output2 .= '<nav aria-label="Page navigation example" id="hia"><ul class="pagination paginationReport justify-content-center"><li class="page-item">
    <a class="page-link pageNumsReport prevBtnReport" id="prevBtnReport" href="?page=' . $page . '">Previous</a>
</li>';

    for ($i = 1; $i <= $totalPages; $i++) {

        $output2 .= '<li class="page-item"><a class="page-link pageNumsReport" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    $output2 .= '<li class="page-item">
<a class="page-link pageNumsReport nextBtnReport" id="nextBtnReport" href="?page=' . $page + 1 . '">Next</a>
</li></ul>
</nav>';
} else {
    $output2 = '<nav aria-label="Page navigation example" id="hia"><ul class="pagination paginationReportFixed justify-content-center"><li class="page-item">
                <a class="page-link pageNumsReportFixed prevBtnReportFixed" id="prevBtnReportFixed" href="?page=' . $page . '">Previous</a>
            </li>';

    for ($i = 1; $i <= $totalPages; $i++) {

        $output2 .= '<li class="page-item"><a class="page-link pageNumsReportFixed" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    $output2 .= '<li class="page-item">
<a class="page-link pageNumsReportFixed nextBtnReportFixed" id="nextBtnReportFixed" href="?page=' . $page + 1 . '">Next</a>
</li></ul>
</nav>';
}


echo json_encode(array('output' => $output, 'output2' => $output2, 'totalPages' => $totalPages));
