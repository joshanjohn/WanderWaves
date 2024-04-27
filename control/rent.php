<?php
    require "../Components/header.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error=null;
        // $user=$_SESSION["user"];
        $user=16;
        // $property=isset($_GET["id"])?$_GET["id"]:null;
       $property= validate_input($_POST['property']);
        $start_date=validate_input($_POST['start_date']);
        $end_date=validate_input($_POST['end_date']);
        echo $property;
        if(!($start_date && $end_date)) $error = "No field should be left empty";
        else if(!$property) $error = "Property ID is missing";
        else if($end_date <= $start_date) $error = "End Date should be greater than Start Date";

        if(!$error){
            // Perform server-side validation 
            // SQL statement with prepared statement 
            $sql_query=$db_connection->prepare(
                "UPDATE tenant SET start_date=?,end_date=?, property_ID=?, agreement=1 WHERE user_ID=?"
            );
            if($sql_query){
                // Bind parameters to the prepared statement
                $sql_query->bind_param("ssii",$start_date,$end_date,$property,$user);

                if($sql_query->execute()){
                    $_SESSION["Response"] = "Agreement signed successfully";

                    // Close database connection
                    $db_connection->close();
                    header("Location:../pages/tenant/rent.php"); 
                }
                else $_SESSION["Errors"] = "Error: Agreement not signed";
            }
            else $_SESSION["Errors"]="System Error: Contact Support";
        }
        else $_SESSION["Errors"]="Error: $error";

        // Close database connection
        $db_connection->close();
        header("Location:../pages/tenant/tenantAccount.php");
    }
?>
