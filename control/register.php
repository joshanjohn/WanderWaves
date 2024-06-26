<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

require "../Components/header.php";
//create tenant account only for tenant access level
function tenantAccount($tenant_ID, $db_connection)
{
    $sql_query = $db_connection->prepare(
        "INSERT INTO tenant(user_ID) VALUES(?)"
    );
    if ($sql_query) {
        // Bind parameters to the prepared statement
        $sql_query->bind_param("s", $tenant_ID);

        if ($sql_query->execute())
            $_SESSION["Response"] = "Tenant account created";
        else
            $_SESSION["Errors"] = "Error: Tenant account not created";

    } else
        $_SESSION["Errors"] = "System Error: Contact Support";
}
function getUser($email, $db_connection)
{
    $sql_query = $db_connection->prepare(
        "SELECT user_id FROM appuser WHERE email=?"
    );
    if ($sql_query) {
        // Bind parameters to the prepared statement
        $sql_query->bind_param("s", $email);
        $sql_query->execute();

        // Get result
        $result = $sql_query->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch data
            while ($row = $result->fetch_assoc())
                return $row['user_id'];
        }
    }
}
// Checking if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $error = null;
    $firstName = validate_input($_POST["firstName"]);
    $lastName = validate_input($_POST["lastName"]);
    $password = validate_input($_POST["password"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $mobile = validate_input($_POST["phoneNumber"]);
    $email = validate_input($_POST["emailAddress"]);
    $userCategory = validate_input($_POST["userCategory"]);


    echo "in register <br>";
    if (!($firstName && $lastName && $mobile && $email && $userCategory && $password))
        $error = "No field should be empty";
    else if (!validate_text($firstName))
        $error = "First Name format is invalid";
    else if (!validate_text($lastName))
        $error = "Last Name format is invalid";
    else if (!validate_password($password))
        $error = "Password format is invalid";
    else if (!preg_match("/^\+353[\d]{9}$/", $mobile))
        $error = "Mobile Number format is invalid";
    else if (!preg_match("/^[a-z\d]+\@[a-z]+\.[a-z]{2,}$/", $email))
        $error = "Email Address format is invalid";
    else if (!validate_category($userCategory))
        $error = "User category is not recognized";
    if (!$error) {
        try {
            // SQL statement with prepared statement
            $sql_query = $db_connection->prepare(
                "INSERT INTO appuser (firstName,lastName,email,mobile,access,password) VALUES (?, ?, ?, ?, ?, ?)"
            );

            if ($sql_query) {
                // Bind parameters to the prepared statement
                $sql_query->bind_param("ssssss", $firstName, $lastName, $email, $mobile, $userCategory, $password_hash);
                if ($sql_query->execute()) {
                    $_SESSION["Response"] = "User registered successfully";
                    if ($userCategory == "tenants")
                        tenantAccount(getUser($email, $db_connection), $db_connection);
                    //Create an instance; passing `true` enables exceptions

                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                        $mail->Username = 'marksiri003@gmail.com';                     //SMTP username
                        $mail->Password = 'nbifhzraaqvgcojr';                               //SMTP password
                        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('marksiri003@gmail.com', 'Wander Waves');
                        $mail->addAddress($email, $firstName);     //Add a recipient


                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Wonder Waves';
                        $mail->Body = "Hey ".$firstName." ".$lastName.", Welcome to Wonder Waves.\n You have successfully registred using ".$email;
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    
                    header("Location:../pages/logIn/LogIn.php");
                } else  
                    $_SESSION["Errors"] = "Error: Email address already exists";
            } else {
                $_SESSION["Errors"] = "System Error: Contact Support";

            }
        } catch (mysqli_sql_exception $exception) {
            if ($exception->getCode() === 1062)
                $_SESSION["Errors"] = "Error: Email address already exists";
            $_SESSION["Errors"] = "System Error: Contact Support";

        }
    } else
        $_SESSION["Errors"] = "Error: $error";
}

// Close database connection
$db_connection->close();
header("Location:../pages/register/register.php");
?>