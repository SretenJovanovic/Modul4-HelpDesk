<?php

require "../../model/db/singletonDB.php";
require "../../model/equipement/equipement.crud.php";




if (isset($_GET['search']) && !empty($_GET['search'])) {

    $search = $_GET['search'];
    $result = EquipementCRUD::searchByIdNameModel($search, $conn);
    $status = $result[0];
    $totalPages = $result[1];
    $msg = $result[2];
} else if (isset($_GET['sort']) && !empty($_GET['sort'])) {
    $sort = $_GET['sort'];
    $result = EquipementCRUD::sortByName($sort, $conn);
    $status = $result[0];
    $totalPages = $result[1];
    $msg = $result[2];
} else {
    $result = EquipementCRUD::getAllEquipement($conn);
    $status = $result[0];
    $totalPages = $result[1];
    $msg = $result[2];
}



$page = $_GET['page'];

if (!$status || $status == []) {
    $allEquipement = [];
} else {
    $allEquipement = [];
    foreach ($status as $eq) {
        $allEquipement[] = new Equipement(...$eq);
    }
}

$output = '<table class="table table-sm mb-5">
<thead class="thead-dark">
    <tr id="userHeading">
        <th>#</th>
        <th>Equipement ID</th>
        <th>Name</th>
        <th>Model</th>
        <th>Manufacture Date</th>
        <th>Serial Number</th>
        <th>Process</th>
        <th colspan=2 class="text-center">Action</th>
    </tr>
</thead>
<tbody id="getAndSearchUsers">';
if ($allEquipement == []) {
    $output .= '<td colspan="8" class="bg-light text-muted">' . $msg . '</td>';
} else {
    foreach ($allEquipement as $index => $eq) :
        $id = $eq->getId();
        $name = $eq->getName();
        $model = $eq->getModel();
        $manufactureDate = $eq->getManufactureDate();
        $serialNumber = $eq->getSerialNumber();
        $process = $eq->getProcess();
        $output .= '
        <tr class="table-secondary">
            <td class="bg-dark text-white">' . ($index += ($page * 8) - 7) . '</td>
            <td>' . $id . '</td>
            <td id="username' . $id . '">' . $name . '</td>
            <td id="firstName' . $id . '">' . $model . '</td>
            <td id="lastName' . $id . '">' . $manufactureDate . '</td>
            <td id="email' . $id . '">' . $serialNumber . '</td>
            <td id="password' . $id . '">' . $process . '</td>

            <td class="text-right">
            <button type="button" class="btn btn-primary btn-block editEquipementModalBtn" data-toggle="modal" data-target="#editEquipementModal" value="' . $id . '">
            Edit
            </button>
            <div class="modal fade" id="editEquipementModal" tabindex="-1" role="dialog" aria-labelledby="editEquipementModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit equipement : <span id="editID"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <form action="" method="POST" id="editEquipementForm">
                        <input type="hidden" name="equipementId" id="eequipementId">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="ename">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="model">Model</label>
                                    <input type="text" id="emodel" class="form-control" name="model">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="manufactureDate">Manufacture Date</label>
                                    <input type="text" id="emanufactureDate" class="form-control" name="manufactureDate">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="serialNumber">Serial Number</label>
                                    <input type="text" class="form-control" name="serialNumber" id="eserialNumber">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="process">Change position:</label>
                                    <select class="form-control" name="process" id="eprocess">
                                        <option value="sirova">Sirova kafa</option>
                                        <option value="przenje">Przenje</option>
                                        <option value="mlevenje">Mlevenje</option>
                                        <option value="pakovanje">Pakovanje</option>
                                        <option value="viljuskari">Viljuskari</option>
                                        <option value="klimatizacija">Klimatizacija</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="submitEdit">Edit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            </td>
            <td class="text-center">
            <button type="button" class="btn btn-danger deleteEquipementModalBtn" data-toggle="modal" data-target="#deleteEquipementModal" value="' . $id . '">
            Delete
        </button>
                <div class="modal fade" id="deleteEquipementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete equipement?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Name: <span id="deleteEqName"></span></h5>
                <form action="#" method="POST" id="deleteEquipementForm">
                    <div class="form-check">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" name="equipementId" id="deleteEqId">
                        <button type="submit" class="btn btn-danger" name="submitDelete">Delete</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
            </td>
        </tr>';
    endforeach;
}

$output .= '
</tbody>
</table>';



$output2 = '';

$output2 .= '<nav aria-label="Page navigation example" id="hia">';
$output2 .= '<ul class="pagination paginationEq justify-content-center">';


$output2 .= '<li class="page-item">
                <a class="page-link pageNumsEq nextBtnEq" id="prevBtnEq" href="?page=' . $page . '">Previous</a>
            </li>';

for ($i = 1; $i <= $totalPages; $i++) {
    $active_class = '';
    $output2 .= '<li class="page-item"><a class="page-link pageNumsEq" href="?page=' . $i . '">' . $i . '</a></li>';
}

$output2 .= '<li class="page-item">
<a class="page-link pageNumsEq nextBtnEq" id="nextBtnEq" href="?page=' . $page + 1 . '">Next</a>
</li>';
$output2 .= '</ul>
</nav>';
echo json_encode(array('output' => $output, 'output2' => $output2, 'totalPages' => $totalPages));
