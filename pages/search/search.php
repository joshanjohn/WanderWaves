<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <title>Search Page</title>

    <link rel="stylesheet" href="../../Assets/css/search.css?v=<?php echo time(); ?>">

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
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require '../../Components/header.php';
    $area = $min_price = $max_price = $num_rooms = $check_in = $check_out = '';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['search'])) {
            $errors = [];


            if (!isset($_POST['area']) && !empty($_POST['area'])) {
                $errors[] = 'Dublin area address is required!';
            } else {
                $area = htmlentities($_POST['area']);
            }

            if (!isset($_POST['min_price']) && !empty($_POST['min_price'])) {
                $errors[] = 'Minimum price is required!';
            } else {
                $min_price = htmlentities($_POST['min_price']);
            }

            if (!isset($_POST['max_price']) && !empty($_POST['max_price'])) {
                $errors[] = 'Maximum price id required!';
            } else {
                $max_price = htmlentities($_POST['max_price']);
            }

            if (!isset($_POST['num_rooms']) && !empty($_POST['num_rooms'])) {
                $errors[] = 'Number of rooms is required!';
            } else {
                $num_rooms = htmlentities($_POST['num_rooms']);
            }

            if (!isset($_POST['check_in']) && !empty($_POST['check_in'])) {
                $errors[] = 'Check in date is required!';
            } else {
                $check_out = htmlentities($_POST['check_in']);
            }

            if (!isset($_POST['check_out']) && !empty($_POST['check_out'])) {
                $errors[] = 'Check out date is required!';
            } else {
                $check_out = htmlentities($_POST['check_out']);
            }


            if (!empty($errors)) {
                echo "<div class='info'>";
                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    echo '<strong>' . $error . '</strong>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                }

            }
        } else {
            $area = htmlspecialchars($_POST['area']);
            $min_price = htmlspecialchars(trim($_POST['min_price']));
            $max_price = htmlspecialchars(trim($_POST['max_price']));
            $num_rooms = htmlspecialchars(trim($_POST['num_rooms']));
            $check_in = htmlspecialchars(trim($_POST['check_in']));
            $check_out = htmlspecialchars(trim($_POST['check_out']));

            $sql = "SELECT * FROM property WHERE ";

            // Append the conditions based on the provided parameters
    
            // 1. Compare the area by the first three symbols
            if (!empty($area)) {
                $sql .= "LEFT(address, 3) = LEFT('$area', 3) AND ";
            }

            // 2. Price should be between max_price and min_price
            if (!empty($min_price) && !empty($max_price)) {
                $sql .= "price BETWEEN $min_price AND $max_price AND ";
            }

            // 3. Number of rooms
            if (!empty($num_rooms)) {
                $sql .= "num_beds = $num_rooms AND ";
            }

            // 4. Check-in and Check-out dates should be between available dates for the property
            if (!empty($check_in) && !empty($check_out)) {
                $sql .= "'$check_in' BETWEEN start_date AND end_date AND ";
                $sql .= "'$check_out' BETWEEN start_date AND end_date AND ";
            }

            // Remove the trailing "AND" if it exists
            $sql = rtrim($sql, " AND ");

            // Execute the query
            $result = mysqli_query($db_connection, $sql);


            // If no results found
            if (mysqli_num_rows($result) == 0) {
                echo "<div class='Message'><p>No appliances found matching the criteria.</p></div>";
            }
            //If results found
            else {
                echo "hello";

                echo "</div>";
            }


            
        }
    }


    ?>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate class="mt-3">
            <div class="form-group">
                <label for="area">Select Dublin Area:</label>
                <select class="form-control" name="area" id="area">
                    <option value="1">D01</option>
                    <option value="2">D02</option>
                    <option value="3">D03</option>
                    <option value="4">D04</option>
                    <option value="5">D05</option>
                    <option value="6">D06</option>
                    <option value="7">D07</option>
                    <option value="8">D08</option>
                    <option value="9">D09</option>
                    <option value="10">D10</option>
                    <option value="11">D11</option>
                    <option value="12">D12</option>
                    <option value="13">D13</option>
                    <option value="14">D14</option>
                    <option value="15">D15</option>
                    <option value="16">D16</option>
                    <option value="17">D17</option>
                    <option value="18">D18</option>
                    <option value="20">D20</option>
                    <option value="22">D22</option>
                    <option value="24">D24</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price Range from:</label>
                <input type="range" min="0" max="1000" value="500" class="slider" id="range_from" name="min_price">
                <div class="slider-value" id="slider_from">50</div>
            </div>
            <div class="form-group">
                <label for="price">Price Range to:</label>
                <input type="range" min="1000" max="1000001" value="500001" class="slider" id="range_to"
                    name="max_price">
                <div class="slider-value" id="slider_to">50001</div>
            </div>

            <script>
                // Get the range sliders and their corresponding value indicators
                var sliderFrom = document.getElementById("range_from");
                var sliderTo = document.getElementById("range_to");
                var outputFrom = document.getElementById("slider_from");
                var outputTo = document.getElementById("slider_to");

                // Display the default slider values
                outputFrom.innerHTML = sliderFrom.value;
                outputTo.innerHTML = sliderTo.value;

                // Update the current slider values (each time the slider handle is dragged)
                sliderFrom.oninput = function () {
                    outputFrom.innerHTML = this.value;
                }

                sliderTo.oninput = function () {
                    outputTo.innerHTML = this.value;
                }
            </script>

            <div class="form-group">
                <label for="num_rooms">Number of Rooms:</label>
                <input type="number" class="form-control" name="num_rooms" id="num_rooms" min="1" max="4">
            </div>

            <div class="form-group">
                <label for="check_in">Check-in Date:</label>
                <input type="date" class="form-control" name="check_in" id="check_in">
            </div>

            <div class="form-group">
                <label for="check_out">Check-out Date:</label>
                <input type="date" class="form-control" name="check_out" id="check_out">
            </div>
            <br>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

    </div>



    <?php

    // TESTIMONIAL SECTION
    //include 'testimonial.php';
    
    // FOOTER
    //include 'Components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>