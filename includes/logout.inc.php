<?php

session_start();
if (isset($_SESSION['loggedUser']))
{
    unset($_SESSION['loggedUser']);
}
header("location:../index.php?msg=loggedOut");
