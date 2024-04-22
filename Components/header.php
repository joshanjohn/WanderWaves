<?php
session_start();
$_SESSION['access'] = "public";
// Including the database connection
if ($_SERVER['SERVER_NAME'] == 'knuth.griffith.ie') {
    // Path for the Knuth server
    $path_to_mysql_connect = __DIR__ . '../../../../../connection.php';
} else {
    // Path for the local XAMPP server
    $path_to_mysql_connect = 'connection.php';
}
require $path_to_mysql_connect;

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


$navLinks = array(
    'base' => array(
        './index.php',
        '/pages/propertyListings/propertyListings.php',
        '/pages/inventoryDetails',
        '/pages/tenantAccount',
        '/pages/landlordAccount',
        '#testimonial',
        '#contact',
        './pages/testimonials/testimonials.php',
        '#contact',
        'logout.php'
    ),
    'pages' => array(
        './index.php',
        '#propertyListings',
        'inventoryDetails',
        '#InventoryDetails',
        '#tenantAccount',
        '#landlordAccount',
        './pages/adverts/adverts.php',
        './pages/testimonials/testimonials.php',
        '#contact',
        'logout.php'
    ),
);


$userLevel = "Admin";
if (isset($_SESSION["userLevel"])) {
    $userLevel = $_SESSION["userLevel"];
}
// $links = $navLinks[$userLevel];


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
                // // Loop through navigation links
                // foreach ($links as $link) {
                //     echo '<li class="nav-item">';
                //     echo '<a class="nav-link" href="' . $link[1] . '">' . $link[0] . '</a>';
                //     echo '</li>';
                // }
                

                if (findDir() == 'base') {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . $navLinks['base'][0] . '">Home</a>';
                    echo '</li>';


                    if ($userLevel != "Public") {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="' . $navLinks['base'][1] . '">Property Listings</a>';
                        echo '</li>';

                    }
                    if ($userLevel != "Public") {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="' . $navLinks['base'][2] . '">Inventory Details</a>';
                        echo '</li>';

                    }
                    if ($userLevel != "Public") {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="' . $navLinks['base'][3] . '">Tenant Account</a>';
                        echo '</li>';

                    }
                    if ($userLevel != "Public") {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="' . $navLinks['base'][4] . '">Landlord Account</a>';
                        echo '</li>';

                    }
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . $navLinks['base'][5] . '">Testimonials</a>';
                    echo '</li>';

                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . $navLinks['base'][6] . '">Contact Us</a>';
                    echo '</li>';

                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . $navLinks['base'][7] . '">Log Out</a>';
                    echo '</li>';


                } else {

                }



                function findDir()
                {
                    if (str_contains($_SERVER['PHP_SELF'], "pages")) {
                        return 'pages';
                    } else {
                        return 'base';
                    }
                }
                ?>


            </ul>
        </div>
    </div>
</nav>