<?php

require "../../model/db/singletonDB.php";
require "../../model/users/user.crud.php";

if (isset($_POST['id'])) {

    $status = UserCRUD::deleteById($_POST['id'],$conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed!";
    }
}
