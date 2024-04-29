<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wander Waves</title>
    <link rel="icon" type="image/x-icon" href="../..//Assets/images/logo.png">
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <!-- <link href="../../Assets/css/index.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id="change_pass_page">
    <?php
    require '../../Components/header.php';

    $email = $new_pass = $confirm_pass = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['change_password'])) {
            $errors = [];

            //Check if email is submitted
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                $errors[] = 'Email address is required!';
            } else {

                $email = validate_input($_POST['email']);
                $stmt = $db_connection->prepare("SELECT * FROM appuser WHERE email=?");
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if (!($result->num_rows > 0)) {
                    $errors[] = "This email address is not registered";
                 
                } 
            }

            //Check if new password is submitted
            if (!isset($_POST['new_pass']) || empty($_POST['new_pass'])) {
                $errors[] = 'New password is required!';
            } else {
                $new_pass = validate_input($_POST['new_pass']);
                $new_pass = password_hash($new_pass, PASSWORD_BCRYPT);
            }
            //Check if confirm password is submitted
            if (!isset($_POST['confirm_pass']) || empty($_POST['confirm_pass'])) {
                $errors[] = 'Confirm new password!';
            } else {
                $confirm_pass = validate_input($_POST['confirm_pass']);
                if (!password_verify($confirm_pass, $new_pass)) {
                    $errors[] = "Confirm password does'nt match.";
                }
            }


            if (!empty($errors)) {
                echo "<div class='info'>";
                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    echo '<strong>' . $error . '</strong>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                }

            } else {
                $sql = "UPDATE appuser SET password = ? WHERE email = ?";
                $stmt = mysqli_prepare($db_connection, $sql);
                if ($stmt) {
                    // Bind parameters
                    mysqli_stmt_bind_param($stmt, "ss", $new_pass, $email);
                    // Execute statement
                    if (mysqli_stmt_execute($stmt)) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        echo '<strong>Sucessfully updated password</strong>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    } else {
                        echo "Error: " . mysqli_stmt_error($stmt);
                    }
                    // Close statement
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error: " . mysqli_error($db_connection);
                }

            }

        }

    }
    ?>
    <section class="vh-100">
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" id="change_password">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://img.freepik.com/free-vector/forgot-password-concept-illustration_114360-1095.jpg?t=st=1713998241~exp=1714001841~hmac=d6fb59f70ee05c078fd14bc28e48267c3d15c234c04f015a02fd456659a287ef&w=740"
                    class="img-fluid" alt="Sample image">
            </div>
            <!-- INPUTS -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate class="mt-3">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">CHANGE PASSWORD</h3>
                <div data-mdb-input-init class="form-group mb-4">
                    <label class="form-label" for="email">Email address:</label>
                    <input type="email" id="email" class="form-control form-control-lg"
                        placeholder="Enter your email address" name="email" />
                </div>

            
                <div data-mdb-input-init class="form-group mb-3">
                    <label class="form-label" for="password">New Password:</label>
                    <input type="password" id="new_pass" class="form-control form-control-lg"
                        placeholder="Enter password" name="new_pass" />
                </div>

                <div data-mdb-input-init class="form-group mb-3">
                    <label class="form-label" for="password">Confirm Password:</label>
                    <input type="password" id="confirm_pass" class="form-control form-control-lg"
                        placeholder="Enter password" name="confirm_pass" />
                </div>

                <div class="form-group">
                    <a class="btn btn-secondary btn-lg" href="<?php echo getbaseURL().'/pages/logIn/LogIn.php'?>">Cancel</a>
                    <button type="submit" name="change_password"
                        class="btn btn-success text-light btn-lg">Confirm</button>
                </div>
        </div>

        </form>
    </section>
    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>