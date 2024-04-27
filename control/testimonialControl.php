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


$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addTestimonial'])) {
    $title = $message = "";

    // validating title 
    if (!isset($_POST['title']) || empty($_POST['title'])) {
        $errors[] = "please enter a title";
    } else {
        $title = validate_input($_POST['title']);
    }

    // validating message
    if (!isset($_POST['message']) || empty($_POST['message'])) {
        $errors[] = "please enter a message";
    } else {
        $message = validate_input($_POST['message']);
    }

    if (empty($errors)) {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $stmt = $db_connection->prepare("INSERT INTO reviews (user_id, title, message) VALUES (?,?,?)");
            $stmt->bind_param("iss", $_SESSION['user'], $title, $message);
            $stmt->execute();
            $stmt->close();
        } else {
            $errors[] = "please login again";
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }


}

?>