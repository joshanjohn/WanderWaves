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
            $stmt = $db_connection->prepare("INSERT INTO reviews (user_id, title, message)");
            $stmt = $stmt->bind_param("iss", $userID, $title, $message);
            if ($stmt->execute()) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo '<strong>Thank you! so much</strong>';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
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

<div class="conatiner mx-auto my-5 w-lg-6500" id="addReview">
    <form class="mt-lg-3 col-lg-6 p-sm-3 mx-auto" method="POST" action="<?php echo 'index.php#addReview'; ?>"
        novalidate>

        <!-- title -->
        <h4 class=" text-center mt-5" id="title">Let's hear from you <i style="color: green;"
                class="bi bi-emoji-smile"></i></h4>

        <div class="form-group px-2">
            <label for="exampleFormControlInput1" class="mb-2">Service Name</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title"
                required value="<?php echo (isset($_POST['title']) ? $_POST['title'] : "") ?>">
        </div><br>
        <div class="form-group px-2">
            <label for="exampleFormControlTextarea1" class="mb-2">Review message</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" cols="5" required
                rows="7"><?php echo (isset($_POST['message']) ? $_POST['message'] : "") ?></textarea>
        </div>

        <button type="submit" name="addTestimonial" class="btn mx-3 my-3">Submit</button>
    </form>
</div>