<?php
if (!isset($_COOKIE['area'])) {
    include '../../pages/cookies/show_cookies.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wander Waves</title>
    <link rel="icon" type="image/x-icon" href="../..//Assets/images/logo.png">
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <title>Search Page</title>
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
    // header
    require '../../Components/header.php';

    // variables
    $area = $min_price = $max_price = $num_rooms = $check_in = $check_out = '';


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {

        //for stroing errors
        $errors = [];

        $area = validate_input($_POST['area']);
        $min_price = validate_input($_POST['min_price']);
        $max_price = validate_input($_POST['max_price']);
        $num_rooms = validate_input($_POST['num_rooms']);
        $check_in = validate_input($_POST['check_in']);
        $check_out = validate_input($_POST['check_out']);

        // VALIDATIONS 
    
        $sql = "SELECT * FROM property WHERE ";

        if (empty($area)) {
            $errors[] = 'Dublin area address is required!';
        } else {
            setcookie("area", $area, time() + 84000);
            $sql .= "eircode like '" . $area . "%' ";
        }

        if (empty($min_price)) {
            $errors[] = 'Minimum price is required!';
        } else {
            setcookie("minPrice", $min_price, time() + 84000);
            $sql .= "AND (PRICE BETWEEN " . $min_price;
        }
        if (empty($max_price)) {
            $errors[] = 'Maximum price id required!';
        } else {
            setcookie("maxPrice", $max_price, time() + 84000);
            $sql .= " AND " . $max_price . ") ";
        }

        if (empty($num_rooms)) {
            $sql .= " AND num_beds >= 1";
        } else {
            setcookie("numRooms", $num_rooms, time() + 84000);
            $sql .= " AND num_beds >=" . $num_rooms;
        }

        if (!empty($check_in)) {
            setcookie("checkIn", $check_in, time() + 84000);
            $sql .= " AND start_date >= " . $check_in;
        }

        if (!empty($check_out)) {
            setcookie("checkOut", $check_out, time() + 84000);
            $sql .= " AND end_date >= " . $check_out;
        }



        if (!empty($errors)) {
            echo "<div class='info'>";
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            foreach ($errors as $error) {
                echo '<li><strong>' . $error . '</strong></li>';
            }
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        } else {
            header("Location: ../property/property.php?sql=" . $sql);
        }

    }

    //function to get cookies
    function getCookie($name){
        if (isset($_COOKIE[$name])){
            return $_COOKIE[$name];
        }
    }

    ?>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate
            class="w-75 mx-auto py-5">
            <!-- AREA -->
            <h1 class="text-center">SEARCH</h1>
            <div class="form-group">
                <label for="area">Select Dublin Area:</label>
                <select class="form-control" name="area" id="area">
                    <option <?php echo (getCookie('area') == "D") ? "selected" : "" ?> value="D">All</option>
                    <option <?php echo (getCookie('area') == "D01") ? "selected" : "" ?> value="D01">D01</option>
                    <option <?php echo (getCookie('area') == "D02") ? "selected" : "" ?> value="D02">D02</option>
                    <option <?php echo (getCookie('area') == "D03") ? "selected" : "" ?> value="D03">D03</option>
                    <option <?php echo (getCookie('area') == "D04") ? "selected" : "" ?> value="D04">D04</option>
                    <option <?php echo (getCookie('area') == "D05") ? "selected" : "" ?> value="D05">D05</option>
                    <option <?php echo (getCookie('area') == "D06") ? "selected" : "" ?> value="D06">D06</option>
                    <option <?php echo (getCookie('area') == "D07") ? "selected" : "" ?> value="D07">D07</option>
                    <option <?php echo (getCookie('area') == "D08") ? "selected" : "" ?> value="D08">D08</option>
                    <option <?php echo (getCookie('area') == "D09") ? "selected" : "" ?> value="D09">D09</option>
                    <option <?php echo (getCookie('area') == "D10") ? "selected" : "" ?> value="D10">D10</option>
                    <option <?php echo (getCookie('area') == "D11") ? "selected" : "" ?> value="D11">D11</option>
                    <option <?php echo (getCookie('area') == "D12") ? "selected" : "" ?> value="D12">D12</option>
                    <option <?php echo (getCookie('area') == "D13") ? "selected" : "" ?> value="D13">D13</option>
                    <option <?php echo (getCookie('area') == "D14") ? "selected" : "" ?> value="D14">D14</option>
                    <option <?php echo (getCookie('area') == "D15") ? "selected" : "" ?> value="D15">D15</option>
                    <option <?php echo (getCookie('area') == "D16") ? "selected" : "" ?> value="D16">D16</option>
                    <option <?php echo (getCookie('area') == "D17") ? "selected" : "" ?> value="D17">D17</option>
                    <option <?php echo (getCookie('area') == "D18") ? "selected" : "" ?> value="D18">D18</option>
                    <option <?php echo (getCookie('area') == "D20") ? "selected" : "" ?> value="D20">D20</option>
                    <option <?php echo (getCookie('area') == "D22") ? "selected" : "" ?> value="D22">D22</option>
                    <option <?php echo (getCookie('area') == "D24") ? "selected" : "" ?> value="D24">D24</option>
                </select>
            </div>

            <!-- PRICE RANGE FROM-->
            <div class="form-group d-flex justify-content-between ">
                <div>
                    <label for="price">Price Range from:</label>
                    <input type="range" min="200" max="10000" value="<?php echo getCookie('minPrice');?>" class="slider"
                        id="range_from" name="min_price">
                    <div class="slider-value" id="slider_from">50</div>
                </div>

                <div class="mx">
                    <label for="price">Price Range to:</label>
                    <input type="range" min="1000" max="10000" value="<?php echo getCookie('maxPrice');?>" class="slider" id="range_to"
                        name="max_price">
                    <div class="slider-value" id="slider_to">5000</div>
                </div>

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

            <!-- ROOMS -->
            <div class="form-group">
                <label for="num_rooms">Number of Rooms:</label>
                <input type="number" class="form-control" name="num_rooms" value="<?php echo getCookie('numRooms')?>" id="num_rooms" min="1" max="4">
            </div>

            <!-- DATES -->
            <div class="form-group">
                <label for="check_in">Check-in Date:</label>
                <input type="date" class="form-control" value="<?php echo getCookie('checkIn');?>" min="<?php echo getCookie('checkIn');?>" name="check_in"  id="check_in">
            </div>

            <div class="form-group">
                <label for="check_out">Check-out Date:</label>
                <input type="date" class="form-control" name="check_out" id="check_out" value="<?php echo getCookie('checkOut');?>"  min="<?php echo getCookie('checkIn');?>">
            </div>
            <br>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

    </div>



    <?php
    ?>
    <!-- JavaScript dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- Script to automatically show the modal of cookies -->
    <script>
        $(document).ready(function () {
            $('#exampleModalCenter').modal('show');
        });
    </script>


</body>

</html>