<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wander Waves</title>
  <link rel="stylesheet" href="Assets/css/index.css?v=<?php echo time(); ?>">
  <!-- <link href="Assets/css/index.css" rel="stylesheet"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0..1,0" />
  <link
    href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if ($_SERVER['SERVER_NAME'] == 'knuth.griffith.ie') {
    $header_path = __DIR__ . '/Components/header.php';
  } else {
    $header_path = __DIR__ . '/Components/header.php';
  }
  require $header_path;
  ?>

  <!-- main page-->
  <section id="index" class="min-vh-100 d-flex align-items-center text-center">
    <div class="container">
      <div class="row">
        <div id="haventitle" class="col-12">
          <h2 class="text-black mt-3 mb-4 fw-semibold" data-aos="fade-right">DISCOVER YOUR DREAM HAVEN</h2>
          <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search property" aria-label="Search"
              aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--- #PROPERTY SECTION-->

  <section class="section property" aria-labelledby="property-label">
    <div class="container">

      <div class="title-wrapper">

        <div>
          <h2 class="section-title headline-small">Best home in your city</h2>


        </div>



      </div>

      <div class="property-list">

        <div class="card">

          <div class="card-banner">

            <figure class="img-holder" style="--width: 585; --height: 390;">
              <img src="Assets/images/images/property-1.jpg" width="585" height="390" alt="COVA Home Realty"
                class="img-cover">
            </figure>

            <span class="badge label-medium">New</span>

            <button class="icon-btn fav-btn" aria-label="add to favorite" data-toggle-btn>
              <span class="material-symbols-rounded" aria-hidden="true">favorite</span>
            </button>

          </div>

          <div class="card-content" id="cardContent">

            <span class="title-large">$710.68</span>

            <h3>
              <a href="#" class="title-small card-title">COVA Home Realty</a>
            </h3>

            <address class="body-medium card-text">
              1901 Thornridge Cir. Shiloh, Hawaii 81063
            </address>

            <div class="card-meta-list">

              <div class="meta-item">
                <span class="material-symbols-rounded meta-icon" aria-hidden="true">bed</span>

                <span class="meta-text label-medium">3 Bed</span>
              </div>



              <div class="meta-item">
                <span class="material-symbols-rounded meta-icon" aria-hidden="true">straighten</span>

                <span class="meta-text label-medium">1430 sqft </span>
              </div>

            </div>

          </div>

        </div>

        <div class="card">

          <div class="card-banner">

            <figure class="img-holder" style="--width: 585; --height: 390;">
              <img src="Assets/images/images/property-2.jpg" width="585" height="390" alt="Exit Realty"
                class="img-cover">
            </figure>

            <button class="icon-btn fav-btn" aria-label="add to favorite" data-toggle-btn>
              <span class="material-symbols-rounded" aria-hidden="true">favorite</span>
            </button>

          </div>

          <div class="card-content">

            <span class="title-large">$630.44</span>

            <h3>
              <a href="#" class="title-small card-title">Exit Realty</a>
            </h3>

            <address class="body-medium card-text">
              2972 Westheimer Rd. Santa Ana, Illinois 85486
            </address>

            <div class="card-meta-list">

              <div class="meta-item">
                <span class="material-symbols-rounded meta-icon" aria-hidden="true">bed</span>

                <span class="meta-text label-medium">5 Bed</span>
              </div>



              <div class="meta-item">
                <span class="material-symbols-rounded meta-icon" aria-hidden="true">straighten</span>

                <span class="meta-text label-medium">1630 sqft </span>
              </div>

            </div>

          </div>

        </div>

        <div class="card">

          <div class="card-banner">

            <figure class="img-holder" style="--width: 585; --height: 390;">
              <img src="Assets/images/images/property-3.jpg" width="585" height="390" alt="The Real Estate Group"
                class="img-cover">
            </figure>

            <button class="icon-btn fav-btn" aria-label="add to favorite" data-toggle-btn>
              <span class="material-symbols-rounded" aria-hidden="true">favorite</span>
            </button>

          </div>

          <div class="card-content">

            <span class="title-large">$475.22</span>

            <h3>
              <a href="#" class="title-small card-title">The Real Estate Group</a>
            </h3>

            <address class="body-medium card-text">
              2118 Thornridge Cir. Syracuse, Connecticut 35624
            </address>

            <div class="card-meta-list">

              <div class="meta-item">
                <span class="material-symbols-rounded meta-icon" aria-hidden="true">bed</span>

                <span class="meta-text label-medium">8 Bed</span>
              </div>



              <div class="meta-item">
                <span class="material-symbols-rounded meta-icon" aria-hidden="true">straighten</span>

                <span class="meta-text label-medium">1240 sqft </span>
              </div>

            </div>

          </div>

        </div>


      </div>

    </div>
  </section>


  <?php
  //ADVERTS SECTION
  include 'pages/adverts/adverts.php';

  // TESTIMONIAL SECTION
  include 'pages/testimonials/testimonial.php';

  if (isset($_SESSION['access']) && !empty($_SESSION['access'])) {
    include 'pages/testimonials/testimonial_add.php';
  }

  // FOOTER
  include 'pages/contact/contactUs.php';
  ?>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
  <script src="Assets/js/index.js"></script>
</body>

</html>