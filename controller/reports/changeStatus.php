<?php

require "../../model/db/singletonDB.php";
require "../../model/reports/failureReport.crud.php";

if (
    isset($_POST['failureId'])
) {
    
    $status = FailureReportCRUD::changeStatus(
        $_POST['failureId'],
        $conn
    );
    
    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed!";
    }
}
