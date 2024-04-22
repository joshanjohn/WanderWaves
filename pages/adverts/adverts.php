<section id="adverts">

    <!-- title -->
    <h3 class=" text-center mt-5" id="title">ADVERTS</h3>

    <!-- upload button -->
    <div class="container mb-4 d-flex justify-content-center">
        <a class="btn btn-outline-secondary mx-4" href="pages/adverts/addAdverts.php"><img
                width="25" height="25" src="https://img.icons8.com/ios-glyphs/25/40C057/upload--v1.png"
                alt="upload--v1" /> Upload</a>
    </div>


    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-inner">
            <?php
            $stmt = $db_connection->prepare("SELECT * FROM ads");
            $stmt->execute();
            $result = $stmt->get_result();
            $slideLen = $result->lengths;
            echo $slideLen;
            // Check if there are any rows returned from the query
            if ($result->num_rows > 0) {
                // Loop through each row and generate a carousel item
                $first = true;
                while ($row = $result->fetch_assoc()) {
                    $activeClass = $first ? 'active' : '';
                    ?>

                    <div class="carousel-item <?php echo $activeClass; ?>">
                        <img src="././<?php echo $row['image']; ?>" class="d-block w-100"
                            alt="<?php echo $row['image']; ?>">
                    </div>

                    <?php
                    $first = false;
                }
            } else {
                echo '<img src="././Assets/images/ads/brand.png" class="d-block w-100" alt="no adsd">';
            }
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <!-- <div class="carousel-indicators">
            
            <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div> -->
    </div>
</section>