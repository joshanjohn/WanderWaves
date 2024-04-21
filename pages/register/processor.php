<?php
    require "header.php";

    // Checking if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $error=null;
        $firstName=validate_input($_POST["firstName"]);
        $lastName=validate_input($_POST["lastName"]);
        $password=validate_input($_POST["password"]);
        $mobile=validate_input($_POST["phoneNumber"]);
        $email=validate_input($_POST["emailAddress"]);
        $userCategory=validate_input($_POST["userCategory"]);

        

        if(!($firstName && $lastName  && $mobile && $email && $userCategory &&$password)) $error="No field should be empty";
        else if(!validate_text($firstName)) $error="First Name format is invalid";
        else if(!validate_text($lastName)) $error="Last Name format is invalid";
        else if(!validate_password($password)) $error="Password format is invalid";
        else if(!preg_match("/^\+353[\d]{9}$/",$mobile)) $error="Mobile Number format is invalid";
        else if(!preg_match("/^[a-z\d]+\@[a-z]+\.[a-z]{2,}$/",$email)) $error="Email Address format is invalid";
        else if(!validate_category($userCategory)) $error="User category is not recognized";
        if(!$error){
            try {
                // SQL statement with prepared statement
                $sql_query = $conn->prepare(
                    "INSERT INTO users (FirstName,LastName,Mobile,Email,userCategory,Password) VALUES (?, ?, ?, ?, ?, ?)"
                );

                if ($sql_query) {
                    // Bind parameters to the prepared statement
                    $sql_query->bind_param("ssssss", $firstName, $lastName, $mobile, $email, $userCategory, $password);
                    if($sql_query->execute()) {
                        $_SESSION["Response"] = "User registered successfully";

                        // Close database connection
                        $conn->close();
                        header("Location:../logIn/LogIn.php");
                    }
                    else $_SESSION["Errors"] = "Error: Email address already exists";
                }
                else $_SESSION["Errors"] = "System Error: Contact Support";
            }
            catch (mysqli_sql_exception $exception) {
                if ($exception->getCode() === 1062) $_SESSION["Errors"] = "Error: Email address already exists";
                $_SESSION["Errors"]="System Error: Contact Support";
            }
        }
        else $_SESSION["Errors"] = "Error: $error";
    }

    // Close database connection
    $conn->close();
    header("Location:register.php");
?>

