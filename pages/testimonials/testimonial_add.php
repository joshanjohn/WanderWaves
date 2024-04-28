<?php
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

$stmt = $db_connection->prepare("SELECT * FROM reviews WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user']);
$stmt->execute();
$result = $stmt->get_result();
if (!($result->num_rows>0)){
    echo '<div class="conatiner mx-auto my-5 w-lg-6500" id="addReview">';
echo '<form class="mt-lg-3 col-lg-6 p-sm-3 mx-auto" method="POST" action="'.htmlentities($_SERVER['PHP_SELF']).'#addReview" novalidate';
echo 'novalidate>';
echo '';
echo '<!-- title -->';
echo '<h4 class=" text-center mt-5" id="title">Let\'s hear from you <i style="color: green;"';
echo 'class="bi bi-emoji-smile"></i></h4>';
echo '';
echo '<div class="form-group px-2">';
echo '<label for="exampleFormControlInput1" class="mb-2">Service Name</label>';
echo '<input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title"';
echo 'required';
echo '</div><br>';
echo '<div class="form-group px-2">';
echo '<label for="exampleFormControlTextarea1" class="mb-2">Review message</label>';
echo '<textarea class="form-control" name="message" id="exampleFormControlTextarea1" cols="5" required rows="7"></textarea>';
echo '</div>';
echo '';
echo '<button type="submit" name="addTestimonial" class="btn mx-3 my-3">Submit</button>';
echo '</form>';
echo '</div>';
}
?>
