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
    define('DB_USER', 'sql8698311');
    define('DB_PASSWD', 'XdpJx7aAXt');
    define('DB_NAME', 'sql8698311');

    // define('DB_HOST', 'localhost');
    // define('DB_USER', 's3092883');
    // define('DB_PASSWD', 'taralien');
    // define('DB_NAME', 's3092883');

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);


    $db_connection  = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWD) or die("could dnot connect to MySQLi !" . mysqli_connect_error());
    echo (!mysqli_select_db($db_connection, DB_NAME)) ? die("unable to select database" . mysqli_error($db_connection)) : "Connected MySQL successfully.";

    // // Check connection
    // if ($db_connection->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";
    ?>
</body>

</html>
<?php
