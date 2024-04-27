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
                            $selected_property=[];
                            foreach ($row as $key => $value)
                                $selected_property[$key]=$value;
                                // echo $key." - ".$value."<br>";
                        }
                    }
                    else $_SESSION["Response"]="Property does not exist";
                }
                else $_SESSION["Errors"]="System Error: Contact Support";
            }
            else $_SESSION["Errors"]="Error: Missing Property ID";
        ?>

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

    <section class="property_edit">
        <div class="container">
            <div class="title-wrapper">
                <h2 class="section-title headline-small">Edit Property</h2>
            </div>
            <form action="../../control/property_edit.php" method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" 
                            value="<?php echo (isset($selected_property['Name']))?$selected_property['Name']:'';?>">

                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address"
                            value="<?php echo (isset($selected_property['address']))?$selected_property['address']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="eircode">Eircode</label>
                            <input type="text" name="eircode" class="form-control" id="eircode" placeholder="Eircode"
                            value="<?php echo (isset($selected_property['eircode']))?$selected_property['eircode']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category"class="custom-select">
                            <option selected disabled>Choose category</option>
                                <option value="house" 
                                <?php if(isset($selected_property['category']) && $selected_property['category']=='house') echo "selected";?>
                                >House</option>
                                <option value="apartment"
                                <?php if(isset($selected_property['category']) && $selected_property['category']=='apartment') echo "selected";?>
                                >Apartment</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Price"
                            value="<?php echo (isset($selected_property['price']))?$selected_property['price']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date"
                            value="<?php echo (isset($selected_property['start_date']))?$selected_property['start_date']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date"
                            value="<?php echo (isset($selected_property['end_date']))?$selected_property['end_date']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control" id="description"
                                placeholder="Description" ><?php echo (isset($selected_property['description']))?$selected_property['description']:'';?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="num_beds">Number of Beds</label>
                            <input type="number" name="num_beds" class="form-control" id="num_beds"
                                placeholder="Number of Beds"  value="<?php echo (isset($selected_property['num_beds']))?$selected_property['num_beds']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="text" name="size" class="form-control" id="size" placeholder="Size"
                             value="<?php echo (isset($selected_property['size']))?$selected_property['size']:'';?>">
                        </div>
                        <div class="form-group">
                            <label for="agreement">Tenant agreement</label>
                            <textarea type="text" name="agreement" class="form-control" id="agreement"
                                placeholder="agreement"> <?php echo (isset($selected_property['agreement']))?$selected_property['agreement']:'';?></textarea>
                        </div>
                        <button id="btn-editP"type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Update property</button>
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
</body>

</html>
