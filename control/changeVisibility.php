<?php 
require '../connection.php';
if (isset($_POST['public'])){

    $stmt = $db_connection->prepare("UPDATE reviews SET visible = true WHERE review_id= ?");
    $id = intval($_POST['public']);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../testimonial_manage.php");
}

if (isset($_POST['private'])){

    $stmt = $db_connection->prepare("UPDATE reviews SET visible = false WHERE review_id= ?");
    $id = intval($_POST['private']);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../testimonial_manage.php");
}
?>