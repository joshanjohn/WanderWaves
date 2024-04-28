<?php
$sql_query = null;
//differentiating query for features and properties
if (!$limit)
    $sql_query = $db_connection->prepare("SELECT * FROM property");
else {
    $sql_query = $db_connection->prepare("SELECT * FROM property LIMIT 3");
}

if (isset($search) && !empty($search)) {
    $sql_query = $db_connection->prepare($search);
}


if ($sql_query) {
    // Execute the prepared statement
    $sql_query->execute();

    // Get result
    $result = $sql_query->get_result();
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch data
        echo "<section class='section property' aria-labelledby='property-label'>";
        echo "<div class='container'>";
        echo "<div class='title-wrapper'>";
        echo "<div>";
        echo "<h2 class='section-title headline-small'>Best homes in Dublin</h2>";

        echo "</div>";
        echo "</div>";
        echo "<div class='property-list'>";
        while ($row = $result->fetch_assoc()) {
            $price = $row["price"];
            $name = $row["Name"];
            $address = $row["address"];
            $num_beds = $row["num_beds"];
            $size = $row["size"];
            if (isset($_SESSION['access'])) {
                $url1 = getbaseURL() . "/pages/property/property_details.php?id=" . $row["property_id"];
            } else {
                $url1 = getbaseURL() . "/pages/logIn/LogIn.php";
            }
             $url = getbaseURL() . "/pages/property/property_edit.php?id=" . $row["property_id"];
            // $url1 = getbaseURL() . "/pages/property/property_details.php?id=" . $row["property_id"];
            echo "<div class='card'>";

            echo "<div class='card-banner'>";
            echo "<figure class='img-holder' style='--width: 585; --height: 390;'>";
            echo "<img src='https://www.rocketmortgage.com/resources-cmsassets/RocketMortgage.com/Article_Images/Large_Images/Stock-Modern-House-In-Twilight-AdobeStock-368976934-copy.jpg' width='585' height='390' alt=" . $name . " class='img-cover'>";
            echo "</figure>";
            if (isset($_SESSION['access'])) {
                if ($_SESSION['access'] == 'admin') {
                    echo "<button class='icon-btn fav-btn' aria-label='add to favorite' data-toggle-btn>";
                    echo "<span class='material-symbols-rounded' aria-hidden='true'><a href=" . $url . ">edit</a> </span>";
                    //  echo "";
                    echo "</button>";
                }
            }

            echo "</div>";
            echo "<div class='card-content' id='cardContent'>";
            echo "<span class='title-large'>$" . $price . "</span>";
            echo "<h3>";
            echo "<a href=" . $url1 . " class='title-small card-title'>" . $name . "</a>";
            echo "</h3>";
            echo "<address class='body-medium card-text'>";
            echo $address;
            echo "</address>";
            echo "<div class='card-meta-list'>";
            echo "<div class='meta-item'>";
            echo "<span class='material-symbols-rounded meta-icon' aria-hidden='true'>bed</span>";
            echo "<span class='meta-text label-medium'>" . $num_beds . " Bed</span>";
            echo "</div>";
            echo "<div class='meta-item'>";
            echo "<span class='material-symbols-rounded meta-icon' aria-hidden='true'>straighten</span>";
            echo "<span class='meta-text label-medium'>" . $size . " sqft</span>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>";
        echo "</div>";
        echo "</section>";

    }else{
        echo '<h1 class="text-center text-secondary">No Match Found<h1>';
    }

} else
    $_SESSION["Errors"] = "System Error: Contact Support";
?>