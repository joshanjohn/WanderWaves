<?php
    require '../Components/header.php';
    unset($_SESSION['access']);
    session_destroy(); //destroy the session
    header("Location: ".getbaseURL()."/index.php"); //to redirect back to "index.php" after logging out
    exit();
?>