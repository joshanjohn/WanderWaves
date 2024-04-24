<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory page</title>
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
    include '../../Components/header.php';

    function isIncluded($data)
    {
        $stmnt = '';
        if ($data == 1) {
            $stmnt = "Yes";
        } else {
            $stmnt = "No";
        }
        return $stmnt;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['eircode'])) {
            $eircode = $_POST['eircode'];
        } else {
            echo "Property Eircode is required";
        }
        $sql = "SELECT a.* 
        FROM appliances a
        JOIN property p ON a.property_id = p.property_id
        WHERE p.eircode = '$eircode'";

        $result = mysqli_query($db_connection, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<strong>No properties found matching the criteria.</strong>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            // echo "<div class='Message'><p>No properties found matching the criteria.</p></div>";
        } else {
            echo "<div class='container' id = 'appliance_container'>";
            echo "<h2 class='mt-5 text-center'>Property Inventory Details</h2>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card mt-3' id = 'appliance_details'>";
                echo "<div class='card-body'>";
                echo "<p class='card-title'>Property ID: " . $row["property_id"] . "</p>";
                echo "<p class='card-text'>Washing machine: " . isIncluded($row["washing_machine"]) . "</p>";
                echo "<p class='card-text'>Microwave: " . isIncluded($row["microwave"]) . "</p>";
                echo "<p class='card-text'>Dryer: " . isIncluded($row["dryer"]) . "</p>";
                echo "<p class='card-text'>Wi-Fi: " . isIncluded($row["wifi"]) . "</p>";
                echo "<p class='card-text'TV: " . isIncluded($row["tv"]) . "</p>";
                echo "</div>";
                echo "</div>";
            }



            echo "</div>";
        }
    }
    ?>
    <div id="invent_content">

        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="../../Assets/images/index2.png" class="img-fluid" alt="Sample image">
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate class="mt-3"
            id="inventory">
            <div class="form-group">
                <h2><label for="eircode">Eircode</label></h2>
                <input type="text" class="form-control" id="eircode" name="eircode">
            </div><br>
            <button type="submit" class="btn btn-primary">Find</button>

        </form>

    </div>

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