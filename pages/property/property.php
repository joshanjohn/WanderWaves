<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <!-- <link href="Assets/css/index.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0..1,0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    require '../../Components/header.php';
    
    $sql_query=$db_connection->prepare("SELECT * FROM property");
    if($sql_query){
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
            echo "<h2 class='section-title headline-small'>Best home in your city</h2>";
            echo "</div>";
            echo "</div>";

            echo "<div class='property-list'>";
            while ($row = $result->fetch_assoc()){
                $price=$row["price"];
                $name=$row["Name"];
                $address=$row["address"];
                $num_beds=$row["num_beds"];
                $size=$row["size"];
                $url="property_edit.php?id=".urlencode($row["property_id"]);
                echo "<div class='card'>";
                    echo "<div class='card-banner'>";
                        echo "<figure class='img-holder' style='--width: 585; --height: 390;'>";
                            echo "<img src='' width='585' height='390' alt=".$name." class='img-cover'>";
                        echo "</figure>";
                        echo "<button class='icon-btn fav-btn' aria-label='add to favorite' data-toggle-btn>";
                            // echo "<span class='material-symbols-rounded' aria-hidden='true'>favorite</span>";
                            echo "<a href=".$url.">A</a>";
                        echo "</button>";
                    echo "</div>";
                    echo "<div class='card-content' id='cardContent'>";
                        echo "<span class='title-large'>$".$price."</span>";
                        echo "<h3>";
                            echo "<a href='#' class='title-small card-title'>".$name."</a>";
                        echo "</h3>";
                        echo "<address class='body-medium card-text'>";
                            echo $address;
                        echo "</address>";
                        echo "<div class='card-meta-list'>";
                            echo "<div class='meta-item'>";
                                echo "<span class='material-symbols-rounded meta-icon' aria-hidden='true'>bed</span>";
                                echo "<span class='meta-text label-medium'>".$num_beds." Bed</span>";
                            echo "</div>";
                            echo "<div class='meta-item'>";
                                echo "<span class='material-symbols-rounded meta-icon' aria-hidden='true'>straighten</span>";
                                echo "<span class='meta-text label-medium'>".$size." sqft</span>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
            echo "</section>";

        }

    }
    else $_SESSION["Errors"]="System Error: Contact Support";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>