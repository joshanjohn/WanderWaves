<?php
require '../Components/header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = null;
    foreach ($_POST as $key => $value)
        echo $key . "-" . $value . "<br>";
    $user = 1;
    $name = validate_input($_POST['name']);
    $address = validate_input($_POST['address']);
    $eircode = validate_input($_POST['eircode']);
    $category = validate_input($_POST['category']);
    $price = validate_input($_POST['price']);
    $start_date = validate_input($_POST['start_date']);
    $end_date = validate_input($_POST['end_date']);
    $description = validate_input($_POST['description']);
    $num_beds = validate_input($_POST['num_beds']);
    $size = validate_input($_POST['size']);
    $agreement = validate_input($_POST['agreement']);

    if (
        !(
            $name && $address && $eircode && $category && $price &&
            $start_date && $end_date && $description && $num_beds && $size
        )
    )
        $error = "No field should be left empty";
    else if (!preg_match("/^[A-Z0-9]{3} [A-Z0-9]{4}$/", $eircode))
        $error = "Eircode format is invalid";
    else if (!validate_category($category))
        $error = "Category doesn't exist";
    else if ($end_date <= $start_date)
        $error = "End Date should be greater than Start Date";

    if ($error) {
        try {
            // SQL statement with prepared statement 
            $sql_query = $db_connection->prepare(
                "INSERT INTO property(user_id,Name,address,eircode,category,price,
                start_date,end_date,description,num_beds,size,agreement) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"
            );
            if ($sql_query) {
                // Bind parameters to the prepared statement
                $sql_query->bind_param(
                    "issssdsssiss",
                    $user,
                    $name,
                    $address,
                    $eircode,
                    $category,
                    $price,
                    $start_date,
                    $end_date,
                    $description,
                    $num_beds,
                    $size,
                    $agreement
                );

                // Execute the query
                if ($sql_query->execute()) {
                    // Close database connection
                    $_SESSION["Response"] = "Property added successfully";
                    $db_connection->close();
                    header("Location:../pages/property/property.php");
                } else
                    $_SESSION["Errors"] = "Error: Property not added";
            } else
                $_SESSION["Errors"] = "System Error: Contact Support";

        } catch (mysqli_sql_exception $exception) {
            $_SESSION["Errors"] = "System Error: Contact Support";
        }
    } else
        $_SESSION["Errors"] = "Error: $error";

    // Close database connection
    $sql_query->close();
    header("Location:../pages/property/property_listing.php");
}
?>