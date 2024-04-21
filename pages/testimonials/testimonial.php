<!-- TESTIMONIAL SECTION -->

<section class="review my-5" id="testimonial">

    
    <!-- title -->
    <h3 class=" text-center mt-5" id="title">OUR REVIEWS</h3>
    
    <!-- edit button -->
    <div class="container mb-4 d-flex justify-content-center">
        <a class="btn btn-outline-secondary mx-4 text-dark" href="pages/testimonials/testimonial_manage.php"><img
                width="25" height="25" src="https://img.icons8.com/color/48/pencil-tip.png" alt="pencil-tip" /> Edit
            Reviews</a>
    </div>
    
    <!-- CARD AREA -->
    <?php
    require_once '././connection.php';
    $stmt = $db_connection->prepare("
            SELECT u.name as name, r.message as message
            FROM reviews AS r
            JOIN appuser AS u
            ON (r.user_id = u.user_id)
            WHERE r.visible=1
            ");   //selecting reviews from MySQL
    $stmt->execute();
    $result = $stmt->get_result();
    echo '<div class="row d-flex justify-content-lg-between justify-content-sm-center align-items-center mx-auto"
            style="width: 85%;">';
    for ($i = 0; $i < 3; $i++) {    // displaying 3 Reviews from Latest Review
        $row = $result->fetch_assoc();
        // CARDS
        echo '<div class="card text-secondary my-4" id="card">';
        echo '<div class="card-body d-flex flex-column justify-content-start" style="min-height: 16rem">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text text-dark">' . $row['message'] . '</p>';
        echo '</div>';
        echo '</div>';
    }
    $stmt->close();
    $db_connection->close();
    ?>
    </div>
</section>