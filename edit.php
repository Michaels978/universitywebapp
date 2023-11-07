<?php

//Starts execution
session_start();
//Variable for token generated from login page
$token = $_SESSION['token'];

//Database connection is made
$conn = mysqli_connect("localhost", "root", "", "images");

//Get data from database
$id = $_GET["id"];
$sql = "SELECT * FROM table1 WHERE id = $id";
$output = mysqli_query($conn, $sql);
$idrow = mysqli_fetch_assoc($output);

//Put data that was obtained into the labels
$name = $idrow['name'];
$filename = $idrow['filename'];


if(isset($_POST['submit'])) //If the user clicks submit
{
    //new id equals to whatever is entered in
    $id = $_POST['id'];
    $name = $_POST['name'];
    $filename = $_FILES['filename']['name'];

    //New image is stored
    $imagelocation = "img/";
    $file = $imagelocation . basename($_FILES['filename']['name']);

    //move file from tempoary file to the real file
    move_uploaded_file($_FILES['filename']['tempoaryname'], $file);

    //Put new course name, image, and filename into the databse and file
    $sql = "UPDATE table1 SET name='$name', filename='$filename' WHERE id='$id'";
    $output = mysqli_query($conn, $sql);
    $token = base64_encode(random_bytes(64));
    session_start();
    $_SESSION['token'] = $token;
    header("location: admin.php?token=".urlencode($token));
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Ulster university tab icon-->
    <link rel="icon" type="image/jpg" href="img/ulsterlogo.jpg">

    <!--Page title-->
    <title>Add Timetable</title>

    <!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--CSS Link-->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!--Title-->
    <div class="my-5 text-center">
        <h1>Edit Timetable</h1>
    </div>

    <div class="editborder">

        <!--enctype allows image to be in img folder-->
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="mb-3">
                <label>New Course Name:</label>
                <!--Label to input course name-->
                <input type="text" class="form-control" placeholder="Enter course name" name="name" autocomplete="off" value="<?php echo $name; ?>">
            </div>

            <div class="mb-3">
                <label>New Timetable:</label>
                <!--File input for the timetable image-->
                <input type="file" id="filename" name="filename" class="form-control" accept=".jpg, .jpeg, .png" value="<?php echo $filename; ?>">
            </div>

            <!--Submit button-->
            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to edit this Timetable?');" name="submit">Submit Edit</button>

            <!--Cancel button-->
            <a class="btn btn-success" href="admin.php?token=<?= urlencode($_SESSION['token']) ?>">Cancel Edit</a>
        </form>
    </div>

</body>

</html>