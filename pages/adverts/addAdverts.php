<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <!-- <link href="Assets/css/index.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- bootstrap -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    // NAVBAR
    require '../../Components/header.php';

    // message
    if (isset($_GET['success'])) {
        if ($_GET['success'] == 'true') {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<strong>Successfully uploaded !</strong>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<strong>Something went wrong on uploading. Please try again</strong>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        // Refreshing
        header("Refresh: 3,addAdverts.php");
    }

    ?>

    <div class="container mx-auto container-sm-fluid m-5 p-5">
        <!-- upload form -->
        <form action="../../control/upload.php" class="mx-auto w-50 mb-5" method="POST" enctype="multipart/form-data">
            <!-- title -->
            <h1 class="text-center mb-5 pb-5">Upload<br> Advertising Photo<br><img width="100" height="100"
                    src="https://img.icons8.com/external-tanah-basah-basic-outline-tanah-basah/100/40C057/external-upload-arrows-tanah-basah-basic-outline-tanah-basah.png"
                    alt="external-upload-arrows-tanah-basah-basic-outline-tanah-basah" /></h1>
            <!-- file input -->
            <div class="input-group">
                <input type="file" class="form-control" name="file" id="inputGroupFile02">
                <button type="submit" name="submit" class="input-group-text" for="inputGroupFile02">Upload</button>
            </div>
        </form>

        <!-- SAVE BUTTON -->
        <div class="container mb-4 d-flex justify-content-center">
            <a class="btn btn-outline-secondary mx-4" href="../../index.php#adverts"><img width="25" height="25"
                    src="https://img.icons8.com/sf-black-filled/64/FAB005/checked-2.png" alt="checked-2" /> Save ads</a>
        </div>

    </div>

    <!-- boostratp -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>