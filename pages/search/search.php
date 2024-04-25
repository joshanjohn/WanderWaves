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
    require '../../Components/header.php';
    ?>
    <div class="container">
        <form action="search.php" method="GET">
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
                <input type="range" min="0" max="1000" value="500" class="slider" id="range_from">
                <div class="slider-value" id="slider_from">50</div>
            </div>
            <div class="form-group">
                <label for="price">Price Range to:</label>
                <input type="range" min="1000" max="5000" value="2500" class="slider" id="range_to">
                <div class="slider-value" id="slider_to">2500</div>
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

            <div class="form-group checkbox">
                <label for="room_type">Accomodation tenancy type:</label><br>
                <div class="form-check form-check-inline">

                    <label class="form-check-label" for="apartment">Apartment
                        <input class="form-check-input" type="checkbox" name="acc_type[]" id="apartment"
                            value="apartment">
                    </label>
                </div>
                <div class="form-check form-check-inline">

                    <label class="form-check-label" for="house">House
                        <input class="form-check-input" type="checkbox" name="acc_type[]" id="house" value="house">
                    </label>
                </div>

            </div>

            <div class="form-group checkbox">
                <label for="room_type">Room Type:</label><br>
                <div class="form-check form-check-inline">

                    <label class="form-check-label" for="single">Single
                        <input class="form-check-input" type="checkbox" name="room_type[]" id="single" value="single">
                    </label>
                </div>
                <div class="form-check form-check-inline">

                    <label class="form-check-label" for="double">Double
                        <input class="form-check-input" type="checkbox" name="room_type[]" id="double" value="double">
                    </label>
                </div>
            </div>

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
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

    </div>




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