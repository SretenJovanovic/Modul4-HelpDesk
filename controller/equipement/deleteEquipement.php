<?php

require "../../model/db/singletonDB.php";
require "../../model/equipement/equipement.crud.php";

if (isset($_POST['id'])) {

    $status = EquipementCRUD::deleteById($_POST['id'],$conn);
    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed!";
    }
}
