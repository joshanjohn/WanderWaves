<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    define('DB_HOST', 'sql8.freesqldatabase.com');
    define('DB_USER', 'sql8701902');
    define('DB_PASSWD', 'v4YZUTLwbm');
    define('DB_NAME', 'sql8701902');



    // Create connection
    // $db_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);


    $db_connection  = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWD) or die("could dnot connect to MySQLi !" . mysqli_connect_error());
     (!mysqli_select_db($db_connection, DB_NAME)) ? die("unable to select database" . mysqli_error($db_connection)) : "Connected MySQL successfully.";

    // // Check connection
    // if ($db_connection->connect_error) {
    //     die("Connection failed: " . $db_connection->connect_error);
    // }
    // echo "Connected successfully";
    ?>
</body>

</html>
<?php
