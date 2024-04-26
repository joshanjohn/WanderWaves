<?php
require '../Components/header.php';

// make it public 
if (isset($_POST['public'])) {
    $stmt = $db_connection->prepare("UPDATE reviews SET visible = true WHERE review_id= ?");
    $id = intval($_POST['public']);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../pages/testimonials/testimonial_manage.php");
}

// make it private
if (isset($_POST['private'])) {
    $stmt = $db_connection->prepare("UPDATE reviews SET visible = false WHERE review_id= ?");
    $id = intval($_POST['private']);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../pages/testimonials/testimonial_manage.php");
}

?>