<?php

require "../model/db/singletonDB.php";
require_once('../model/login.php');
require_once('../model/users/user.class.php');

if (isset($_POST['email_username']) && isset($_POST['password']) && !empty($_POST['email_username']) && !empty($_POST['password'])) {

    $status = Login::login($_POST['email_username'], $_POST['password'], $conn);
    if ($status) {
        session_start();
        $_SESSION['loggedUser'] = $status;
        $type = $status->getType();
        echo $type;
    } else {
        echo "Failed!";
    }
}
