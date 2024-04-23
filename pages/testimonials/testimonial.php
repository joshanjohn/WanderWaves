<!-- TESTIMONIAL SECTION -->

<section class="review my-5" id="testimonial">


    <!-- title -->
    <h3 class="text-center mt-lg-5" id="title">OUR REVIEWS</h3>

    <!-- edit button -->
    <?php
    if (isset($_SESSION['access'])) {
        if ($_SESSION['access'] == 'admin') {
            echo '<div class="container mb-4 d-flex justify-content-center">';
            echo '<a class="btn btn-outline-secondary mx-4 " href="pages/testimonials/testimonial_manage.php"><img width="25"';
            echo 'height="25" src="https://img.icons8.com/color/48/pencil-tip.png" alt="pencil-tip" /> Edit';
            echo 'Reviews</a>';
            echo '</div>';
        }
    }
    ?>


    <!-- CARD AREA -->
    <?php
    $stmt = $db_connection->prepare("
            SELECT u.name as name, r.message as message, r.title as title
            FROM reviews AS r
            JOIN appuser AS u
            ON (r.user_id = u.user_id)
            WHERE r.visible=1
            ");   //selecting reviews from MySQL
    $stmt->execute();
    $result = $stmt->get_result();
    echo '<div class="row d-flex justify-content-lg-between justify-content-sm-between align-items-center mx-auto"
            style="width: 85%;">';
    for ($i = 0; $i < 3; $i++) {    // displaying 3 Reviews from Latest Review
        $row = $result->fetch_assoc();
        // CARDS
        echo '<div class="card text-secondary my-4" id="card">';
        echo '<div class="card-body d-flex flex-column justify-content-between" style="min-height: 16rem">';

        echo '<div class="row">';
        echo '<h5 class="card-title">' . $row['title'] . '</h5>';
        echo '<p class="card-text">' . $row['message'] . '</p>';
        echo '</div>';

        echo '<div class="row">';
        echo '<p class="card-text name">@' . $row['name'] . '</p>';
        echo '</div>';
        
        echo '</div>';
        echo '</div>';
    }
    $stmt->close();
    $db_connection->close();
    ?>

    </div>
</section>