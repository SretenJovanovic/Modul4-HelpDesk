<?php

require "../../model/db/singletonDB.php";
require "../../model/equipement/equipement.crud.php";

if (isset($_POST['id'])) {

    $status = EquipementCRUD::getById($_POST['id'], $conn);

    if ($status) {
        echo json_encode($status);
    } else {
        echo $status;
        echo "Failed!";
    }
}
