<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- TESTIMONIAL MANAGE -->

    <?php
    include '../../Components/header.php';
    ?>

    <!-- title -->
    <h3 class=" text-center m-3 p-3" id="title">MANAGE REVIEWS</h3>

    <!-- SAVE BUTTON -->
    <div class="container mb-4 d-flex justify-content-center">
        <a class="btn btn-outline-secondary mx-4" href="../../index.php#testimonial"><img width="25" height="25"
                src="https://img.icons8.com/sf-black-filled/64/FAB005/checked-2.png" alt="checked-2" /> Save Reviews</a>
    </div>

    <section class="review my-5">
        <?php
        $stmt = $db_connection->prepare("
            SELECT u.firstName as firstName, u.lastName as lastName, r.message as message, r.visible as visible, r.review_id as review_id, r.title as title
            FROM reviews AS r
            JOIN appuser AS u
            ON (r.user_id = u.user_id)
            GROUP BY r.review_id
            ORDER BY r.visible DESC
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        echo '<div class="row d-flex justify-content-lg-between justify-content-md-center align-items-center mx-auto"
            style="width: 85%;">';

        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            // CARDS
            echo '<div class="card text-secondary my-4" id="card">';
            echo '<div class="card-body d-flex justify-content-between flex-column" style="min-height: 20rem">';


            echo '<div class="row">';
            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
            echo '<p class="card-text">' . $row['message'] . '</p>';
            echo '</div>';

            echo '<div class="row justify-content-between">';
            echo '<div class="col">';
            echo '<p class="card-text name">@' . $row['firstName'] . ' ' . $row['lastName'] . '</p>';
            echo '</div>';
            echo '<div class="col">';
            displayBtn($row['visible'], $row['review_id']);
            echo '</div>';
            echo '</div>';


            // Review update button
        
            echo '</div>';
            echo '</div>';
        }
        $stmt->close();

        function displayBtn($bool, $id)
        {
            if ($bool == "1") {
                echo '<form action="../../control/testimonialControl.php" method="POST">';
                echo '<button class="btn btn-dark mx-2" name="private" value="' . $id . '"> private </button>';
                echo '</form>';
            } else {
                echo '<form action="../../control/testimonialControl.php" method="POST">';
                echo '<button class="btn btn-success mx-2" name="public" value="' . $id . '"> public </button>';
                echo '</form>';
            }
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </section>
</body>

</html>