<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addTestimonial'])) {
    // validating title 
    if (isset($_POST['title']) || !empty($_POST['title'])) {
        $errors[] = "please enter a title";
    }
    // validating message
    if (isset($_POST['message']) || !empty($_POST['message'])) {
        $errors[] = "please enter a message";
    }

}
?>



<div class="conatiner mx-auto my-5 w-lg-6500" id="addReview">
    <form class="mt-lg-3 col-lg-6 p-sm-3 mx-auto" method="POST" action="<?php echo 'index.php#addReview'; ?>">
        <!-- title -->
        <h4 class=" text-center mt-5" id="title">Let's hear from you <i style="color: green;" class="bi bi-emoji-smile"></i></h4>
        <?php
        if (!empty($errors)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
                

        <div class="form-group px-2">
            <label for="exampleFormControlInput1" class="mb-2">Service Name</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div><br>
        <div class="form-group px-2">
            <label for="exampleFormControlTextarea1" class="mb-2">Review message</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" cols="5" rows="7"></textarea>
        </div>

        <button type="submit" name="addTestimonial" class="btn mx-3 my-3">Submit</button>
    </form>
</div>