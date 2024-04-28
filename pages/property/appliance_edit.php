<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Edit Form</title>
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <?php
    include '../../Components/header.php';
    
    $property_id;
    if (!(isset($_GET['id']))) {
        $errors[] = 'Property ID not found';
    } else {
        $property_id = $_GET['id'];
        echo $property_id;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateAppliance'])) {
        $errors = [];


        $washing = getValue('washing');
        $micro = getValue('micro');
        $dryer = getValue('dryer');
        $wifi = getValue('wifi');
        $tv = getValue('tv');
        if (empty($errors)) {
            $stmt = $db_connection->prepare("UPDATE appliances SET washing_machine=?, microwave=?, dryer=?, wifi=?, tv=? WHERE property_id = ?");
            $stmt->bind_param("iiiiii", $washing, $micro, $dryer, $wifi, $tv, $property_id);
            if ($stmt->execute()) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo '<strong> Successfully Updated Appliance </strong>';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
    }
    function getValue($name)
    {
        if (!isset($_POST[$name])) {
            return 0;
        } else {
            return $_POST[$name];
        }
    }
    ?>
    <div class="conatiner mx-auto my-5 w-lg-6500" id="updateAppliance">
        <form class="mt-lg-3 col-lg-6 p-sm-3 mx-auto" method="POST"
            action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id='.$property_id; ?>">
            <!-- title -->
            <h4 class=" text-center mt-5" id="title">Appliance Edit</h4>

            <div class="form-check w-50 mx-auto">
                <input class="form-check-input" type="checkbox" name="washing" value="1" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Washing Machine
                </label>
            </div>

            <div class="form-check w-50 mx-auto">
                <input class="form-check-input" type="checkbox" name="micro" value="1" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Microwave
                </label>
            </div>

            <div class="form-check w-50 mx-auto">
                <input class="form-check-input" type="checkbox" name="dryer" value="1" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Dryer
                </label>
            </div>

            <div class="form-check w-50 mx-auto">
                <input class="form-check-input" type="checkbox" name="wifi" value="1" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Wifi
                </label>
            </div>

            <div class="form-check w-50 mx-auto">
                <input class="form-check-input" type="checkbox" name="tv" value="1" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    TV
                </label>
            </div>


            <button type="submit" name="updateAppliance" class="btn mx-3 my-3">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>