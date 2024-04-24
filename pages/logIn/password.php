<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- <link rel="stylesheet" href="../Assets/css/index.css?v=<?php echo time(); ?>"> -->
    <link href="../../Assets/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id = "change_pass_page">
    <?php
    require '../../Components/header.php';



    $email = $new_pass = $confirm_pass = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['change_password'])) {
            $errors = [];


            //Check if first name is submitted
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                $errors[] = 'Email address is required!';
            } else {
                $email = htmlentities($_POST['email']);
            }

            //Check if last name is submitted
            if (!isset($_POST['new_pass']) || empty($_POST['new_pass'])) {
                $errors[] = 'New password is required!';
            } else {
                $new_pass = htmlentities($_POST['new_pass']);
            }

            if (!isset($_POST['confirm_pass']) || empty($_POST['confirm_pass'])) {
                $errors[] = 'Confirm new password!';
            } else {
                $new_pass = htmlentities($_POST['confirm_pass']);
            }
            if (!empty($errors)) {
                echo "<div class='info'>";
                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    echo '<strong>'. $error. '</strong>';
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
                        echo " <button type='submit' name='back' class='btn btn-primary'>Back to Login</button>";
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
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" id = "change_password">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">CHANGE PASSWORD</h3>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate class="mt-3">
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email">Email address:</label>
                    <input type="email" id="email" class="form-control form-control-lg"
                        placeholder="Enter your email address" name="email" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                    <label class="form-label" for="password">New Password:</label>
                    <input type="password" id="new_pass" class="form-control form-control-lg"
                        placeholder="Enter password" name="new_pass" />
                </div>

                <div data-mdb-input-init class="form-outline mb-3">
                    <label class="form-label" for="password">Confirm Password:</label>
                    <input type="password" id="confirm_pass" class="form-control form-control-lg"
                        placeholder="Enter password" name="confirm_pass" />
                </div>

                <button type="submit" name="change_password" class="btn btn-primary">Confirm</button>
            </form>
        </div>
    </section>

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