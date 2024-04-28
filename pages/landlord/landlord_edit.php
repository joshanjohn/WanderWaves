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
     include '../../Components/header.php';
    // function to fetch user data
    
    ?>

    <div class="conatiner mx-auto my-5 w-lg-6500" id="update_landlord">
        <!-- title -->
        <h4 class=" text-center mt-5" id="title">Landlord Edit</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate
            class="mt-lg-3 col-lg-6 p-sm-3 mx-auto">
            <div class="input-group mb-3">
                <span class="input-group-text" for="userID">User ID:</span>
                <input type="text" id="lastName" name="userID" class="form-control"
                    value="<?php echo htmlspecialchars($lastName); ?>" required>


            </div>
            <div class="form-group w-50 mx-auto">
                <button type="submit" name="find_landlord" class="btn btn-lg mx-auto my-3">Find</button>
                <a href="#" class="btn btn-lg btn-secondary">Back</a>
            </div>
        </form>
        <form class="mt-lg-3 col-lg-6 p-sm-3 mx-auto" method="POST"
            action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" novalidate>



            <div class="input-group mb-3">
                <span class="input-group-text" id="income">First name</span>
                <input type="text" class="form-control" name="income" value="<?php echo htmlspecialchars($firstName); ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="income">Last name</span>
                <input type="text" class="form-control" name="commission"
                    value="<?php echo htmlspecialchars($lastName); ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="income">Email</span>
                <input type="text" class="form-control" name="management_fees"
                    value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="form-group w-50 mx-auto">
                <button type="submit" name="update_landlord" class="btn btn-lg mx-auto my-3">Update</button>

            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>