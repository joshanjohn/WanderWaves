<?php
session_start();
$_SESSION['access'] = 'public';

// Including the database connection
if ($_SERVER['SERVER_NAME'] == 'knuth.griffith.ie') {
    // Path for the Knuth server
    $path_to_mysql_connect = __DIR__ . '../../../../../connection.php';
} else {
    // Path for the local XAMPP server
    $path_to_mysql_connect = 'connection.php';
}
require $path_to_mysql_connect;

function getbaseURL()
{
    // Get the full URL from the browser
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $url = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    // Find the position of "WanderWaves" in the URL
    $position = strpos($url, 'WanderWaves');

    // Return the URL up to "WanderWaves"
    if ($position !== false) {
        return substr($url, 0, $position + strlen('WanderWaves'));
    }

    return $url; // Return the original URL if "WanderWaves" is not found
}


$userLevel = $_SESSION['access'];

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <!-- <img src="./Assets/images/logo.png" alt="Wander Waves Logo" width="50px" height="50px"> -->
            <img src="https://i.ibb.co/NYFdhbq/logo.png" alt="Wander Waves Logo" width="50px" height="50px">
        </a>
        <!-- <div class="img2"><img src="./Assets/images/navImage.png" alt="Wander Waves header pic" width="200px" height="100px"></div> -->
        <div class="img2"><img src="https://i.ibb.co/KVzw7r9/navImage.png" alt="Wander Waves header pic" width="200px"
                height="100px"></div>
        <!-- Toggle button for smaller screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . getbaseURL() . '/index.php">Home</a>';
                echo '</li>';

                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . getbaseURL() . '/index.php#testimonial">Testimonials</a>';
                echo '</li>';

                if ($userLevel == 'tenants' || $userLevel == 'admin' || $userLevel == 'landlord') {
                    if ($userLevel == 'landlord' || $userLevel == 'admin') {
                        if ($userLevel == 'admin') {

                        }
                    }

                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . getbaseURL() . '/pages/logIn/LogIn.php">Log Out</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . getbaseURL() . '/pages/logIn/LogIn.php">Login</a>';
                    echo '</li>';
                }


                // if ($userLevel == "admin" ) {
                //     echo '<li class="nav-item">';
                //     echo '<a class="nav-link" href="' . $navLinks['base'][1] . '">Property Listings</a>';
                //     echo '</li>';
                
                // }
                // if ($userLevel != "Public") {
                //     echo '<li class="nav-item">';
                //     echo '<a class="nav-link" href="' . $navLinks['base'][2] . '">Inventory Details</a>';
                //     echo '</li>';
                
                // }
                // if ($userLevel != "Public") {
                //     echo '<li class="nav-item">';
                //     echo '<a class="nav-link" href="' . $navLinks['base'][3] . '">Tenant Account</a>';
                //     echo '</li>';
                
                // }
                // if ($userLevel != "Public") {
                //     echo '<li class="nav-item">';
                //     echo '<a class="nav-link" href="' . $navLinks['base'][4] . '">Landlord Account</a>';
                //     echo '</li>';
                
                // }
                // echo '<li class="nav-item">';
                // echo '<a class="nav-link" href="' . $navLinks['base'][5] . '">Testimonials</a>';
                // echo '</li>';
                
                // echo '<li class="nav-item">';
                // echo '<a class="nav-link" href="' . $navLinks['base'][6] . '">Contact Us</a>';
                // echo '</li>';
                
                // echo '<li class="nav-item">';
                // if ($userLevel == "Public") {
                //     echo '<a class="nav-link" href="' . $navLinks['base'][7] . '">Log in</a>';
                // } else {
                //     echo '<a class="nav-link" href="' . $navLinks['base'][8] . '">Log Out</a>';
                // }
                // echo '</li>';
                

                ?>


            </ul>
        </div>
    </div>
</nav>


<?php
//user defined functions 
function validate_input($data)
{
    if (empty($data))
        return null;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_text($data)
{
    return preg_match("/^[a-zA-Z\d ]{2,50}$/", $data);
}

function validate_password($data)
{
    return true;
}
function validate_category($data)
{
    return ($data != "Admin" && $data != "Landlord" && $data != "Tenant");
}
?>