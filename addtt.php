<?php

//Starts execution
session_start();
//Variable for token generated from login page
$token = $_SESSION['token'];

//Database connection is made
$conn = mysqli_connect("localhost", "root", "", "images");

//If the token is the same, the user is allowed to start adding timetables
if (isset($_POST['submit'])) 
{
    //Course name and filename variables
    $name = $_POST['name'];
    $filename = $_FILES['filename']['name'];

    //file location to store the image
    $location = "img/";
    
    //Variables for the image being stored, coures name, and file being put into on variable
    $file = $location . basename($_FILES["filename"]["name"]);

    //file is moved from tempoary storage and moved to the real files where they'll be stored in the database and image file
    move_uploaded_file($_FILES["filename"]["tempoaryname"], $file);

    //Finds database name and collects the variables
    $sql = "INSERT INTO table1 (name, filename) values('$name','$filename')";
    //Action to put course name and timetable image is made
    $output = mysqli_query($conn, $sql);
    //Go back to the admin page with the token that was generated eailer
    header("Location: admin.php?token=" . urlencode($token));
    //Stop execution
    exit;
}

//Close database connection
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Ulster university tab icon-->
    <link rel="icon" type="image/jpg" href="img/ulsterlogo.jpg">

    <!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--CSS Link-->
    <link rel="stylesheet" href="style.css">

    <!--Page title-->
    <title>Add Timetable</title>

</head>

<body>

    <div class="my-5 text-center">
        <!--Title-->
        <h1>Add Timetable</h1>
    </div>

    <div class="bg-light addingborder">

        <!--enctype allows image to be in img folder-->
        <form method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Course Name:</label>
                <!--Label to input course name-->
                <input type="text" class="form-control" placeholder="Enter course name" name="name" autocomplete="off">
            </div>

            <div class="mb-3">
                <label>Timetable:</label>
                <!--File input for the timetable image and only allow images with jpgm pjeg, and png-->
                <input type="file" id="filename" name="filename" class="form-control" accept=".jpg, .jpeg, .png">
            </div>

            <!--Submit button-->
            <button type="submit" class="btn btn-primary"
                onclick="return confirm('Are you sure you want to add this Timetable?');" name="submit">Submit</button>

            <!--Cancel button-->
            <a href="admin.php?token=<?= urlencode($_SESSION['token']) ?>" class="btn btn-primary" href="admin.php">Go Back</a>
        </form>
    </div>

</body>

</html>