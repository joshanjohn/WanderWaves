<?php

//starting a session 
session_start();

// Including the database connection
if ($_SERVER['SERVER_NAME'] == 'knuth.griffith.ie') {
    // Path for the Knuth server
    $path_to_mysql_connect = __DIR__ . '/connection.php';
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


function getRelativePath()
{
    // Get the current URL
    $currentURL = $_SERVER['REQUEST_URI'];

    // Define the base directory to check
    $baseDir = '/WanderWaves/';

    // Check if the base directory is present in the URL
    if (strpos($currentURL, $baseDir) !== false) {
        // Get the subdirectories after the base directory
        $subDirectories = substr($currentURL, strpos($currentURL, $baseDir) + strlen($baseDir));

        // Check if there are any subdirectories
        if (!empty($subDirectories)) {
            // Count the number of subdirectories
            $numSubDirectories = substr_count($subDirectories, '/');

            // Generate the relative path to the base folder
            $relativePath = '';
            for ($i = 0; $i < $numSubDirectories; $i++) {
                $relativePath .= '../';
            }
            return $relativePath;
        } else {
            // No subdirectories present, return empty string
            return '';
        }
    } else {
        // Base directory not found, return empty string
        return '';
    }
}


?>

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <!-- <img src="./Assets/images/logo.png" alt="Wander Waves Logo" width="50px" height="50px"> -->
            <img src="https://i.ibb.co/NYFdhbq/logo.png" alt="Wander Waves Logo" width="50px" height="50px">
        </a>
        <div class="img2"><img src="<?php echo getbaseURL().'/Assets/images/image.png'?>" alt="Wander Waves header pic" width="200px" height="70px"></div>
        <!-- <div class="img2"><img src="https://i.ibb.co/KVzw7r9/navImage.png" alt="Wander Waves header pic" width="200px"
                height="100px"></div> -->
        <!-- Toggle button for smaller screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">

            
                <?php
                //HOME
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . getbaseURL() . '/index.php">Home</a>';
                echo '</li>';
                // TESTIMONIALS
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . getbaseURL() . '/index.php#testimonial">Testimonials</a>';
                echo '</li>';

                // SEARCH
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . getbaseURL() . '/pages/search/search.php">Search</a>';
                echo '</li>';


                if (isset($_SESSION['access'])) {
                    $userLevel = $_SESSION['access'];
                    if ($userLevel == 'tenants' || $userLevel == 'admin' || $userLevel == 'landlord') {
                        if ($userLevel == 'landlord' || $userLevel == 'admin') {
                            if ($userLevel == 'admin') {
                                //Log Out
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="' . getbaseURL() . '/pages/property/property.php">Properties</a>';
                                echo '</li>';
                            }
                            //Log Out
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="' . getbaseURL() . '/pages/inventory/inventory_details.php">Inventory</a>';
                            echo '</li>';
                        }
                        else if($userLevel == 'tenants'){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="' . getbaseURL() . '/pages/tenant/tenantAccount.php">Profile</a>';
                            echo '</li>';
                        }
                        //Explore
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="' . getbaseURL() . '/pages/property/property.php">Explore</a>';
                        echo '</li>';


                        //Log Out
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="' . getbaseURL() . '/control/logout.php">Log Out</a>';
                        echo '</li>';
                    }
                }else{
                    // Login
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . getbaseURL() . '/pages/logIn/LogIn.php">Login</a>';
                    echo '</li>';
                }
                
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
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}

function validate_text($data)
{
    return preg_match("/^[a-zA-Z\d ]{2,50}$/", $data);
}

function validate_password($data){
  if(strlen($data)<6) return false;

  $upper=0;
  $lower=0;
  $numbers=0;
  $special=0;
  
  for(str_split($data) as $character){
    if(ctype_upper($characeter)) $upper+=1;
    else if(ctype_lower($characeter)) $lower+=1;
    else if(ctype_digit($characeter)) $digit+=1;
    else $special+=1;
  }
  
  return $upper && $lower && $numbers && $special;
}


function validate_category($data)
{
    return ($data == "admin" || $data == "landlord" || $data == "tenants");
}


?>