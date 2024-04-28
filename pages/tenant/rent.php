<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../../Assets/css/index.css?v=<?php echo time(); ?>">
    <!-- <link href="Assets/css/index.css" rel="stylesheet"> -->
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
    include '../../Components/header.php';
    $property_id=(isset($_GET["id"]))?$_GET["id"]:null;
    if($property_id){
        $sql_query=$db_connection->prepare("SELECT * FROM property WHERE property_id=?");
        if($sql_query){
            // Bind parameters to the prepared statement
            $sql_query->bind_param("s",$property_id);
            $sql_query->execute();

            // Get result
            $result = $sql_query->get_result();

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Fetch data
                while ($row = $result->fetch_assoc()){
                   $agreement=$row["agreement"];
                }
            }
            else $_SESSION["Response"]="Property does not exist";
        }
        else $_SESSION["Errors"]="System Error: Contact Support";
    }
    else $_SESSION["Errors"]="Error: Missing Property ID";
    ?>
        <section class="property_edit">
        <div class="container">
            <div class="title-wrapper">
                <h2 class="section-title headline-small">Tenancy agreement</h2>
            </div>
            <form action="../../control/rent.php" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="property" value="<?php echo $property_id;?>">
                        <div class="form-group">
                            <label for="start_date">start_date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start_date">
                                             </div>
                        <div class="form-group my-2">
                            <label for="end_date">End_date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="End_date">
                                                 </div>
                      
                                
                                             <div class="form-group">
                            <label for="agreement">Tenant agreement</label>
                            <textarea disabled type="text" name="agreement" class="form-control" id="agreement" rows="6"
                                placeholder="agreement"><?php echo isset($agreement)?$agreement:"No agreement provided";?></textarea>
                        </div><br>
                        <button id="btn-editP"type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Confirm</button>

                    </div>
                    
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>