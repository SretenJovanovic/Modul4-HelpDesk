<?php

require "../../model/db/singletonDB.php";
require "../../model/reports/failureReport.crud.php";

if (
    isset($_POST['operatorID']) &&
    isset($_POST['equipementID']) &&
    isset($_POST['failureDesc'])
) {
    
    $status = FailureReportCRUD::add(
        $_POST['failureDesc'],
        $_POST['operatorID'],
        $_POST['equipementID'],
        'in progress',
        $conn
    );
    
    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed!";
    }
}
