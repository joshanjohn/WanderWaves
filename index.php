<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="Assets/css/index.css" rel="stylesheet">
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
    require 'Components/navbar.php';
    require 'connection.php';
    ?>

    <!-- main page-->
    <section id="index" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div id="haventitle" class="col-12">
                    <h2 class="text-black mt-3 mb-4 fw-semibold" data-aos="fade-right">DISCOVER YOUR DREAM HAVEN</h2>
                    <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search property"
                            aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL SECTION -->
    <section class="review my-5" id="testimonial">
        <!-- title -->
        <h3 class=" text-center" id="title">OUR REVIEWS</h3>
        <div class="row d-flex justify-content-between mx-auto" style="width: 85%;">
            <?php
            $stmt = $db_connection->prepare("SELECT * FROM reviews");   //selecting reviews from MySQK
            $stmt->execute();
            $result = $stmt->get_result();
            for ($i = 0; $i < 3; $i++) {    // displaying 3 Reviews from Latest Review
                $row = $result->fetch_assoc();
                // CARDS
                echo '<div class="card text-white my-4" id="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-text text-dark">' . $row['message'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <?php
    require 'Components/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>