<?php

require "model/reports/failureReport.class.php";
require "model/users/user.crud.php";
require "model/equipement/equipement.crud.php";
require "model/reports/failureReport.crud.php";
require "model/db/singletonDB.php";
session_start();


$equipement = EquipementCRUD::getEquipement($conn)[0];

if (!$equipement || $equipement == []) {
    $allEquipement = 'There is no equipement';
} else {
    $allEquipement = [];
    foreach ($equipement as $eq) {
        $allEquipement[] = new Equipement(...$eq);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Jquery,popper,bootsrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 4 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- My css -->
    <link rel="stylesheet" href="css/style.css">

    <title>HelpDesk</title>
</head>

<body class="bg-light">

    <!-- Alert messages home page  -->
    <div id="alertMessage"></div>

    <!-- CONTAINER -->
    <div id="container">
        <?php
    // Checking which user type is logged
        if (isset($_SESSION['loggedUser']) && !empty($_SESSION['loggedUser'])) {
            $type = $_SESSION['loggedUser']->getType();
            if ($type == 'administrator') {
                include_once('view/administrator/administrator.view.php');
            } else if ($type == 'operator') {
                include_once('view/operator/operator.view.php');
            } else if ($type == 'technician') {
                include_once('view/technician/technician.view.php');
            } else {
                header('Location:index.php?msg=invalidUser');
            }
        } else {
            header('Location:index.php?msg=userNotLogged');
        }
        ?>

        <!-- FOOTER -->
        <footer>
            <div class="text-white text-center pt-1">
                <p>Copyright &copy; 2023 by ProjectX </p>
            </div>
        </footer>
    </div>

    <!-- My JS -->
    <script src="js/main.js"></script>
    <script src="js/alert.js"></script>
    <script src="js/ajax/ajax.js"></script>
    <script src="js/ajax/search.ajax.js"></script>
    <script src="js/ajax/pagination.ajax.js"></script>
</body>

</html>