<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <!-- <link href="Assets/css/index.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    require '../../Components/header.php';

    //function to get user details
    function getUserDetails($user_id, $db_connection)
    {
        // stores the user results
        $details = [];

        $sql_query = $db_connection->prepare(
            "SELECT firstName, lastName from appuser where user_id=?"
        );

        if ($sql_query) {
            // Bind parameters to the prepared statment
            $sql_query->bind_param("i", $user_id);
            $sql_query->execute();

            // Get result
            $result = $sql_query->get_result();

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Fetch data
                while ($row = $result->fetch_assoc()) {
                    foreach ($row as $key => $value)
                        $details[$key] = $value;
                }
                return $details;
            }
        } else
            $_SESSION["Errors"] = "System Error: Contact Support";

        return null;

    }


    // function to get details of landlords income
    function getIncomeDetails($user_id, $db_connection)
    {
        // stores the user results
        $details = [];

        $sql_query = $db_connection->prepare(
            "SELECT * from landlord where user_id=?"
        );

        if ($sql_query) {
            // Bind parameters to the prepared statment
            $sql_query->bind_param("i", $user_id);
            $sql_query->execute();

            // Get result
            $result = $sql_query->get_result();

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Fetch data
                while ($row = $result->fetch_assoc()) {
                    foreach ($row as $key => $value)
                        $details[$key] = $value;
                }
                return $details;
            } else {
                // Echo statement if landlord details not found
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo '<strong>Landlord account is not found</strong>';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
                echo '<button type="submit" name="back" class="btn btn-lg mx-auto my-3 "><a href = "../../">Back</a></button>';
            }
        } else
            $_SESSION["Errors"] = "System Error: Contact Support";

        return null;
    }
    $user = $_SESSION["user"];
    $user_details = getUserDetails($user, $db_connection);
    $income_details = getIncomeDetails($user, $db_connection);

    // printing results
    if ($user_details && $income_details) {

        if ($income_details) {

            echo "<section>";
            echo "<img src='../../Assets/images/profile.png' alt='User profile' style='max-height:10%;max-width:15%; padding: none;margin-right:45%; margin-left: 40%;'>";
            echo "<div class='container mt-5' style='padding: 20px;'>";
            echo "<div class='card'>";
            echo "<div class='card-header'>";
            echo "<h2 class='card-title'>" . $user_details["firstName"] . " " . $user_details["lastName"] . "</h2>";
            echo "</div>";
            echo "<div class='card-body'>";
            echo "<p class='card-text'><strong>Income: $</strong>" . $income_details["income"] . "</p>";
            echo "<p class='card-text'><strong>Commission: $</strong>" . $income_details["commission"] . "</p>";
            echo "<p class='card-text'><strong>Management fees: $</strong>" . $income_details["management_fees"] . "</p>";
            echo "<p class='card-text'><strong>Net income: $</strong>" . $income_details["net_income"] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
        } else
            $_SESSION["Errors"] = "Error: Failed to load user details";
    } else
        $_SESSION["Errors"] = "Error: Failed to load user details";
    ?>
    <div id="message-box" class="<?php echo (isset($_SESSION["Errors"])) ? "container errors" : "container"; ?>">
        <?php
        if (isset($_SESSION["Response"])) {
            echo $_SESSION["Response"];
            unset($_SESSION["Response"]);
        } else if (isset($_SESSION["Errors"])) {
            echo $_SESSION["Errors"];
            unset($_SESSION["Errors"]);
        }
        ?>
    </div>
    
    <!-- scripts -->
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