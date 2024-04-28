<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact'])) {
    $name = validate_input($_POST['name']);
    $mobile = validate_input($_POST['mobile']);
    $mail = validate_input($_POST['mail']);
    $subject = validate_input($_POST['subject']);
    $message = $_POST['message'];

    $errors = []; // Initialize an empty array to store error messages

    // Name Validation
    if (empty($name)) {
        $errors[] = "Please enter the name";
    } else if (!preg_match('/^[a-zA-Z ]+$/', $name)) {
        $errors[] = "Name can only contain letters and spaces";
    }

    // Mobile Number Validation
    if (empty($mobile)) {
        $errors[] = "Please enter the mobile number";
    } else if (!preg_match('/^(\+353|0)(\s?\d){9}$/', $mobile)) {
        $errors[] = "Invalid Irish phone number format";
    }

    // Email Validation
    if (empty($mail)) {
        $errors[] = "Please enter the email address";
    } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Subject Validation
    if (empty($subject)) {
        $errors[] = "Please enter the subject";
    }

    if (empty($message)) {
        $errors[] = "Please enter the message";
    }


    if (empty($errors)){
        $stmt = $db_connection->prepare("INSERT INTO feedbacks (name, mail, mobile, subject, message) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $name, $mail, $mobile, $subject, $message);
        $stmt->execute();
    }
    

}
?>


<!-- CONTACT -->
<section class=" bg-light" id="contact">
    <div id="flex" class="container">
        <div class="row">
            <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                <div class="section-title">
                    <h1 class="display-4 text-white fw-semibold">Get in touch</h1>
                    <div class="line bg-white"></div>
                    <p class="text-white">Get in touch with us and let's start a conversation about your property needs
                        today!
                </div>

            </div>
            <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="250">
                <?php 
                    if (!empty($errors) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show w-50 my-4" role="alert">';
                        foreach ($errors as $error) {
                            echo '<li>' . $error . '</li>';
                        }
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                ?>
                <div class="col-lg-8">

                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'#contact'; ?>"
                        class="row g-3 p-lg-5 p-4 bg-white theme-shadow" novalidate method="POST">

                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" inputmode="tel" class="form-control" name="mobile"
                                placeholder="Mobile number">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" name="mail" placeholder="Email address">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" name="subject" placeholder="subject">
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" rows="5" class="form-control"
                                placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group ">
                            <button id="btnC" name="contact" type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn text-light" style="padding-left: 2.5rem; padding-right: 2.5rem;">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>