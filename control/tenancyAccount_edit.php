<?php
    require "../Components/header.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $error=null;
        $user=$_SESSION["user"];
        $start_date=validate_input($_POST["start_date"]);
        $end_date=validate_input($_POST["end_date"]);
        $amount_paid=validate_input($_POST["amount_paid"]);

        if(!($start_date && $end_date && $amount_paid)) $error="No field should be left empty";
        else if($start_date >= $end_date) $error="End date should be greater than start date";

        if(!$error){
            try{
                // Prepare the SQL statement
                $sql_query = $db_connection->prepare(
                    "UPDATE tenant SET start_date=?, end_date=?, 
                    amountPaid=? WHERE user_ID=?"
                );

                if($sql_query){
                    // Bind parameters to the prepared statement
                    $sql_query->bind_param("ssdi",$start_date,$end_date,$amount_paid,$user);
                    $sql_query->execute();

                    $_SESSION["Response"]=(
                        ($sql_query->affected_rows==0)?
                        "Tenant account was not updated":
                        "Tenant account was updated successfully"
                    );
                    header("Location:../pages/tenant/tenantAccount.php");
                    return;
                }
                else $_SESSION["Errors"]="System Error: Contact Support";
            }
            catch (mysqli_sql_exception $exception) {
                $_SESSION["Errors"]="System Error: Contact Support";
            }
        }
        else $_SESSION["Errors"]="Error: $error";
    header("Location:../pages/tenant/tenantAccount_edit.php");

}
?>
