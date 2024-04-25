<?php
    require "../Components/header.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $error=null;
        $email=validate_input($_POST["email"]);
        $password=validate_input($_POST["password"]);
        $password_hash=password_hash($password, PASSWORD_BCRYPT);
        if(!($email && $password)) $error="No field should be empty";
         else if(!preg_match("/^[a-z\d]+\@[a-z]+\.[a-z]{2,}$/",$email)) $error="Email Address format is invalid";

        if(!$error){
            // Prepare the SQL statement
            $sql_query = $db_connection->prepare(
                "SELECT * FROM appuser WHERE email = ?"
            );

            if($sql_query){
                // Bind parameters to the prepared statement
                $sql_query->bind_param("s", $email);
                $sql_query->execute();

                // Get result
                $result = $sql_query->get_result();

                // Check if any rows were returned
                if ($result->num_rows > 0) {
                    // Fetch data
                    while ($row = $result->fetch_assoc()){
                        if(password_verify($password, $row["password"])){
                            foreach($row as $key => $val){
                                if($key=="access") $_SESSION["CURRENT_USER_ACCESS"]=$val;
                                else if($key=="user_id") $_SESSION["CURRENT_USER_ID"]=$val;
                                else $_SESSION[$key]=$val;
                                 }
                    }
                    }

                    // Close database connection
                    $db_connection->close();
                    header("Location:../index.php");
                }
                else $_SESSION["Response"]="User doesn't exist";
            }
            else $_SESSION["Errors"]="System Error: Contact Support";
        }
        else $_SESSION["Errors"] = "Error: $error";
    }

    // Close database connection
    $db_connection->close();
    header("Location:../logIn.php");
?>