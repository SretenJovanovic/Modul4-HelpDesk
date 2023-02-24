<?php
/*
// All reports
$reports = FailureReportCRUD::getAllReports($conn)['reports'];
$number_of_pages = FailureReportCRUD::getAllReports($conn)['numOfPages'];
$current_page = FailureReportCRUD::getAllReports($conn)['page'];

if (!$reports) {
    $allReports[] = "There are no reports";
} else {
    $allReports = [];
    foreach ($reports as $report) {
        $userById = UserCRUD::getById($report['operator_id'], $conn);
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

        $equipementById = EquipementCRUD::getById($report['equipement_id'], $conn);
        $equipement = new Equipement(
            $equipementById['ID'],
            $equipementById['name'],
            $equipementById['model'],
            $equipementById['manufactureDate'],
            $equipementById['serialNumber'],
            $equipementById['process']
        );
        if ($report['status'] == 'in progress') {
            $status = false;
        } else {
            $status = true;
        }
        $allReports[] = new FailureReport($report['ID'], $user, $equipement, $report['description'], $report['report_date'], $report['fixed_date'], $status);
    }
}


// All reports with status IN PROGRESS

$reportsProgress = FailureReportCRUD::getAllReportsProgress($conn)['reportsProgress'];
$numberOfPagesProgress = FailureReportCRUD::getAllReportsProgress($conn)['numOfPagesProgress'];
$currentPageProgress = FailureReportCRUD::getAllReportsProgress($conn)['page'];
if (!$reportsProgress || $reportsProgress == []) {
    $allReportsProgress = [];
} else {
    $allReportsProgress = [];
    foreach ($reportsProgress as $report) {
        $userById = UserCRUD::getById($report['operator_id'], $conn);
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

        $equipementById = EquipementCRUD::getById($report['equipement_id'], $conn);
        $equipement = new Equipement(
            $equipementById['ID'],
            $equipementById['name'],
            $equipementById['model'],
            $equipementById['manufactureDate'],
            $equipementById['serialNumber'],
            $equipementById['process']
        );
        if ($report['status'] == 'in progress') {
            $status = false;
        } else {
            $status = true;
        }
        $allReportsProgress[] = new FailureReport($report['ID'], $user, $equipement, $report['description'], $report['report_date'], $report['fixed_date'], $status);
    }
}

// All reports with status FIXED
$reportsFixed = FailureReportCRUD::getAllReportsFixed($conn)['reportsFixed'];
$numberOfPagesFixed = FailureReportCRUD::getAllReportsFixed($conn)['numOfPagesFixed'];
$currentPageFixed = FailureReportCRUD::getAllReportsFixed($conn)['page'];
if (!$reportsFixed || $reportsFixed == []) {
    $allReportsFixed = [];
} else {
    $allReportsFixed = [];
    foreach ($reportsFixed as $report) {
        $userById = UserCRUD::getById($report['operator_id'], $conn);
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

        $equipementById = EquipementCRUD::getById($report['equipement_id'], $conn);
        $equipement = new Equipement(
            $equipementById['ID'],
            $equipementById['name'],
            $equipementById['model'],
            $equipementById['manufactureDate'],
            $equipementById['serialNumber'],
            $equipementById['process']
        );
        if ($report['status'] == 'in progress') {
            $status = false;
        } else {
            $status = true;
        }
        $allReportsFixed[] = new FailureReport($report['ID'], $user, $equipement, $report['description'], $report['report_date'], $report['fixed_date'], $status);
    }
}
*/