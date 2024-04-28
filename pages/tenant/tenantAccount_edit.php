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
        body {
            font-family: 'Fira Sans', sans-serif;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <?php
    require '../../Components/header.php';

        ?>
    <section class="property_edit">
        <div class="container">
            <div class="title-wrapper">
                <h2 style="margin-left: 35%;"class="section-title">Edit Tenant account</h2>
            </div>
            <form action="../../control/tenancyAccount_edit.php" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_date">Start date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start date" 
                            value="<?php echo (isset($selected_property['start_date']))?$selected_property['start_date']:'';?>">

                        </div>
                        <div class="form-group">
                            <label for="end_date">End date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="end_date"
                            value="<?php echo (isset($selected_property['end_date']))?$selected_property['end_date']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="amount_paid">Amount Paid</label>
                            <input type="number" name="amount_paid" class="form-control" id="amount_paid" placeholder="amount_paid"
                            value="<?php echo (isset($selected_property['amount_paid']))?$selected_property['amount_paid']:'';?>">
                        </div>
                       
                    </div>
                </div>
                                  <button type="submit"style='margin:25px;margin-left:45%;'id='btn-editP' class='btn btn-outline-primary' data-mdb-ripple-init>Confirm</button>

            </form>
            <div id="message-box"
    class="<?php echo (isset($_SESSION["Errors"]))? "container errors":"container";?>"
>
    <?php
        if(isset($_SESSION["Response"])){
            echo $_SESSION["Response"];
            unset($_SESSION["Response"]);
        }
        else if(isset($_SESSION["Errors"])){
            echo $_SESSION["Errors"];
            unset($_SESSION["Errors"]);
        }
    ?>
</div>

        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
