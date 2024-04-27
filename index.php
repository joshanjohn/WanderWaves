<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="Assets/css/index.css?v=<?php echo time(); ?>">
  <!-- <link href="Assets/css/index.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
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
  <main>
    <article>
      <section style="height:100vh;" class="hero">
        <div class="container">
          <div class="hero-content">
            <h1 class="headline-large hero-title">Discover your dream Haven</h1>
            <p class="body hero-text">
              Find your perfect sanctuary with Wander Wave, where every step leads you closer to home.
            </p>
            <a href="./pages/search/search.php"><button id="searchbtn" type="button" class="btn btn-lg btn-outline-success">
              <i class="fa fa-search"></i> Search Property
            </button></a>

            <img src="Assets/images/images/hero.png" width="816" height="659" role="presentation" class="hero-banner">
            <img src="Assets/images/images/bg-pattern.png" width="1240" height="840" role="presentation"
              class="bg-pattern">

          </div>
      </section>
    </article>
  </main>
  <!--#PROPERTY SECTION-->
  <?php
  $limit = true;
  require_once 'control/property_display.php'
    ?>


  <!--- #PROPERTY SECTION-->



  <?php

  $limit = true;
  require_once 'control/property_display.php';

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="Assets/js/index.js"></script>
</body>

</html>