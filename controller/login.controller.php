<?php

require "../model/db/singletonDB.php";
require_once('../model/login.php');
require_once('../model/users/user.class.php');

if (isset($_POST['email_username']) && isset($_POST['password'])) {
session_start();
    $status = Login::login($_POST['email_username'], $_POST['password'], $conn);
    
    $_SESSION['loggedUser'] = $status;
    $type = $status->getType();
    if ($type == 'administrator') {
        header('Location:../home.php?type=administrator');
    } else if ($type == 'operator') {
        header('Location:../home.php?type=operator');
    } else if ($type == 'technician') {
        header('Location:../home.php?type=technician');
    } else {
        header('Location:../index.php?msg=loginFailed');
    }
}
