<?php
session_start();
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
// Define an array of links for each user level
$navLinks = array(
    'Public' => array(
        array('Home', './index.php'),
        array('Adverts', '#adverts'),
        array('Testimonials', '#testimonial'),
        array('Contact Us', '#contact'),
        array('Log In', 'pages/logIn/LogIn.php')
    ),
    'Landlord' => array(
        array('Home', './index.php'),
        array('Property Listings', '#propertyListings'),
        array('Inventory Details', '#InventoryDetails'),
        array('Tenant Account', '#tenantAccount'),
        array('Landlord Account', '#landlordAccount'),
        array('Adverts', './pages/adverts/adverts.php'),
        array('Testimonials', './pages/testimonials/testimonials.php'),
        array('Contact Us', '#contact'),
        array('Log Out', 'logout.php')
    ),
    'Tenant' => array(
        array('Home', '#home'),
        array('Adverts', './pages/adverts/adverts.php'),
        array('Testimonials', './pages/testimonials/testimonials.php'),
        array('Inventory Details', '#InventoryDetails'),
        array('Tenancy Account', '#tenancyAccount'),
        array('Contact Us', '#contact'),
        array('Log Out', 'logout.php')
    ),
    'Admin' => array(
        array('Home', './index.php'),
        array('Property Listings', '#propertyListings'),
        array('Inventory Details', '#InventoryDetails'),
        array('Tenant Account', '#tenantAccount'),
        array('Landlord Account', '#landlordAccount'),
        array('Adverts', './pages/adverts/adverts.php'),
        array('Testimonials', './pages/testimonials/testimonials.php'),
        array('Contact Us', '#contact'),
        array('Log Out', 'logout.php')
    )
);
$userLevel = "Public";
if (isset($_SESSION["userLevel"])) {
    $userLevel = $_SESSION["userLevel"];
}
$links = $navLinks[$userLevel];


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
                // Loop through navigation links
                foreach ($links as $link) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . $link[1] . '">' . $link[0] . '</a>';
                    echo '</li>';
                }
                ?>
            </ul>

        </div>
    </div>
</nav>