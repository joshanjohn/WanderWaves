<?php 
require '../Components/header.php';
session_start();
if (isset($_SESSION['access']) && isset($_SESSION['user'])){
    header('Location: '.getbaseURL());
}

?>