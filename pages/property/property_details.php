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
    // Check if property ID is provided in the URL
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];
    $url="../tenant/rent.php?id=".urlencode($property_id);


    // Fetch property details from the database
    $query = "SELECT * FROM property WHERE property_id = $property_id";
    $result = mysqli_query($db_connection, $query);

    // Check if property exists
    if (mysqli_num_rows($result) > 0) {
        $property = mysqli_fetch_assoc($result);
    ?>
    <section >
            <div class="container mt-5" style="padding: 20px;">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title"><?php echo $property['Name']; ?></h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Address:</strong> <?php echo $property['address']; ?></p>
                        <p class="card-text"><strong>Eircode:</strong> <?php echo $property['eircode']; ?></p>
                        <p class="card-text"><strong>Category:</strong> <?php echo $property['category']; ?></p>
                        <p class="card-text"><strong>Price:</strong> $<?php echo $property['price']; ?></p>
                        <p class="card-text"><strong>Start Date:</strong> <?php echo $property['start_date']; ?></p>
                        <p class="card-text"><strong>End Date:</strong> <?php echo $property['end_date']; ?></p>
                        <p class="card-text"><strong>Description:</strong> <?php echo $property['description']; ?></p>
                        <p class="card-text"><strong>Number of Beds:</strong> <?php echo $property['num_beds']; ?></p>
                        <p class="card-text"><strong>Size:</strong> <?php echo $property['size']; ?> sqft</p>
                    </div>
                </div>
               <?php 
                if (isset($_SESSION['access'])){
                    if ($_SESSION['access'] == 'tenants'){
                        echo '<a href="<?php echo $url;?>" id="btn-editP" class="btn">Rent property</a>';
                    }
                }
               ?>
            </div>
           
    </section>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
<?php
    } else {
        // If property not found
        echo "<p>Property not found.</p>";
    }
} else {
    // If property ID not provided in URL
    echo "<p>No property ID provided.</p>";
}
?>