<?php

require "../../model/db/singletonDB.php";
require "../../model/users/user.crud.php";

if (isset($_POST['id'])) {

    $status = UserCRUD::getById($_POST['id'], $conn);

    if ($status) {
        echo json_encode($status);
    } else {
        echo $status;
        echo "Failed!";
    }
}
