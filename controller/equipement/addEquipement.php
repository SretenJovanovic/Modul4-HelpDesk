<?php

require "../../model/db/singletonDB.php";
require "../../model/equipement/equipement.crud.php";

if (
    isset($_POST['name']) &&
    isset($_POST['model']) &&
    isset($_POST['manufactureDate']) &&
    isset($_POST['serialNumber']) &&
    isset($_POST['process'])
) {

    $status = EquipementCRUD::add(
        $_POST['name'],
        $_POST['model'],
        $_POST['manufactureDate'],
        $_POST['serialNumber'],
        $_POST['process'],
        $conn
    );
    
    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed!";
    }
}
