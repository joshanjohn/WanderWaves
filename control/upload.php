<?php
require '../Components/header.php';

if (isset($_POST['submit']) && $_FILES['file']['error'] != 4) {
    $file = $_FILES['file'];
    // print_r($file);
    $fileName = $file['name'];  //name of file 
    $fileTempName = $file['tmp_name'];  // temp name of file
    $fileSize = $file['size'];  // file size
    $fileError = $file['error'];    // error code (0=no problem)
    $fileType = $file['type'];  // type of file

    //extracting file extension by spliting at .
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt)); // file extension

    // allowed file extension for uploading
    $allowed = array('jpeg', 'jpg', 'png');


    // Check if the file extension is in the allowed list
    if (in_array($fileActualExt, $allowed)) {
        // Check if there is no file upload error
        if ($fileError == 0) {
            // Check if the file size is within the limit
            if ($fileSize < 10000000) { // 10 MB limit
                // Generate a unique filename
                $fileNameNew = uniqid() . "." . $fileActualExt;
                // Set the file destination

                if ($_SERVER['SERVER_NAME'] == 'knuth.griffith.ie') {
                    $fileDestination = getRelativePath() . '/Assets/images/ads/' . $fileNameNew;

                } else {
                    $fileDestination = '../Assets/images/ads/' . $fileNameNew;
                }

                // Move the uploaded file to the destination
                if (move_uploaded_file($fileTempName, $fileDestination)) {
                    // Prepare and execute SQL statement to insert the file path into the database
                    $stmt = $db_connection->prepare("INSERT INTO ads (image) VALUES (?)");
                    $fileDestination = '/Assets/images/ads/' . $fileNameNew; // Update file destination for database
                    $stmt->bind_param("s", $fileDestination);
                    $stmt->execute();

                    // Redirect with success message
                    echo "success";
                    header("Location: ../pages/adverts/addAdverts.php?success=true");
                } else {
                    header("Location: ../pages/adverts/addAdverts.php?success=false");
                }

            } else {
                // File size exceeds the limit, display error message
                echo "Your file is too big.";
                header("Location: ../pages/adverts/addAdverts.php?success=false");
            }
        } else {
            // There was an error uploading the file, display error message
            echo "There was an error uploading your file.";
            header("Location: ../pages/adverts/addAdverts.php?success=false");
        }
    } else {
        // File type not allowed, display error message
        echo "Cannot upload this file type.";
        header("Location: ../pages/adverts/addAdverts.php?success=false");
    }

} else {
    header("Location: ../pages/adverts/addAdverts.php");
}
?>