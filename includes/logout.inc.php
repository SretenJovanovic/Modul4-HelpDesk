<?php

session_start();
// Logout if user logged
if (isset($_SESSION['loggedUser'])) {
    unset($_SESSION['loggedUser']);
}
header("location:../index.php?msg=loggedOut");
