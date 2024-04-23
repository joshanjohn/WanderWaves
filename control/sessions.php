<?php 
session_start();
$_SESSION['access'] = 'admin';
header("Location: ../index.php");
?>