<?php

require "../../model/db/singletonDB.php";
require "../../model/users/user.crud.php";

if (
    isset($_POST['userId']) &&
    isset($_POST['username']) &&
    isset($_POST['email']) &&
    isset($_POST['firstName']) &&
    isset($_POST['lastName']) &&
    isset($_POST['age']) &&
    isset($_POST['phone']) &&
    isset($_POST['type']) &&
    isset($_POST['password'])
) {

    $status = UserCRUD::update(
        $_POST['userId'],
        $_POST['username'],
        $_POST['email'],
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['age'],
        $_POST['phone'],
        $_POST['type'],
        $_POST['password'],
        $conn
    );

    
    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed!";
    }
}
