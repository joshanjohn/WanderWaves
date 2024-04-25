<?php
session_start();
//if user is not logged in, redirected to index.php
if (!(isset($_SESSION["user"]) &&isset($_SESSION["access"]))) {
header("location: ../index.php"); exit;
} 
?>