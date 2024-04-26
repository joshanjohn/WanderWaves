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
    ?>
    <section class="property_edit">
        <div class="container">
            <div class="title-wrapper">
                <h2 class="section-title headline-small">Add Property</h2>
            </div>
            <form action="../../control/property_listing.php" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                             </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                                 </div>
                        <div class="form-group">
                            <label for="eircode">Eircode</label>
                            <input type="text" name="eircode" class="form-control" id="eircode" placeholder="Eircode">
                                                  </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category"class="custom-select">
                            <option selected disabled>Choose category</option>
                                <option value="house">House</option>
                                <option value="apartment">Apartment</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                                             </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date">
                                                    </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control" id="description"
                                placeholder="Description" >
                                </textarea>
                        </div>
                        <div class="form-group">
                            <label for="num_beds">Number of Beds</label>
                            <input type="number" name="num_beds" class="form-control" id="num_beds"
                                placeholder="Number of Beds">                   
                                   </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="text" name="size" class="form-control" id="size" placeholder="Size">
                                             </div>
                        <button id="btn-editP"type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Add property</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
