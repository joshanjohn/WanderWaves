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
    <style>
        form input,
        form label {
            font-size: 18px;
            padding: 4px;
        }
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    // header
    include '../../Components/header.php';
    //storing the errors
    $errors = [];
    //variables
    $userID = $income = $commission = $mfee = $net = "";
    //find landlord
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['find_landlord'])) {
        $userID = $_POST['userID'];
        $stmt = $db_connection->prepare("SELECT * FROM landlord WHERE user_id=?");
        $stmt->bind_param("i", $_POST['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $income = $data['income'];
            $commission = $data['commission'];
            $mfee = $data['management_fees'];
            $net = $data['net_income'];
        } else {
            $errors = "No user ID found";
        }
        $stmt->close();
    }
    // UPDATE
    if (isset($_POST['update_landlord'])) {
        $userID = $_POST['userID'];
        $income = validate_input($_POST['income']);
        $commission = validate_input($_POST['commission']);
        $mfee = validate_input($_POST['mfee']);
        $net = validate_input($_POST['net']);


        if (empty($income)) {
            $errors[] = "Please enter income";
        }

        if (empty($commission)) {
            $errors[] = "Please enter Commission";
        }

        if (empty($mfee)) {
            $errors[] = "Please enter Management Fee";
        }

        if (empty($net)) {
            $errors[] = "Please enter Net Income";
        }


        if (empty($errors)) {
            $stmt = $db_connection->prepare("UPDATE landlord SET income=?, commission=?, management_fees=?, net_income=? WHERE user_id=?");
            $stmt->bind_param("iiiii", $income, $commission, $mfee, $net, $userID);
            echo $userID;
            if ($stmt->execute()) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo 'Updated Successfully';
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

    ?>

    <!-- FORMS -->
    <div class="conatiner mx-auto my-5 w-lg-6500" id="update_landlord">
        <!-- SEARCH -->
        <h4 class=" text-center mt-5" id="title">Landlord Edit</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate
            class="mt-lg-3 col-lg-6 p-sm-3 mx-auto">
            <div class="input-group mb-3">
                <span class="input-group-text" for="userID">User ID:</span>
                <input type="text" name="userID" class="form-control" required value="<?php echo $userID; ?>">
            </div>
            <div class="form-group w-50 mx-auto">
                <button type="submit" name="find_landlord" class="btn btn-lg mx-auto my-3">Find</button>
            </div>
        </form>



        <form class="mt-lg-3 col-lg-6 p-sm-3 mx-auto" method="POST"
            action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" novalidate>
            <div class="input-group mb-3">
                <span class="input-group-text" for="userID">User ID:</span>
                <input type="text" name="userID" class="form-control" required value="<?php echo $userID; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="income">Income</span>
                <input type="text" class="form-control" name="income" value="<?php echo $income; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="income">Commision</span>
                <input type="text" class="form-control" name="commission" value="<?php echo $commission; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="income">Management Fee</span>
                <input type="text" class="form-control" name="mfee" value="<?php echo $mfee; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="income">Net Income</span>
                <input type="text" class="form-control" name="net" value="<?php echo $net; ?>">
            </div>
            <div class="form-group w-50 mx-auto">
                <button type="submit" name="update_landlord" class="btn btn-lg mx-auto my-3">Update</button>
                <a href="<?php echo getbaseURL().'/pages/property/property.php'?>" class="btn btn-lg btn-secondary">Back</a>

            </div>
        </form>
    </div>

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>