<?php

//Starts execution
session_start();

//Variable for token generated from login page
$token = $_SESSION['token'];

//Database connection is made
$conn = mysqli_connect("localhost", "root", "", "images");

//Delete the row from the databse from the related row that was clicked
$sql = "DELETE FROM `table1` WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) 
{
    //Go back ti the admin page
    header("Location: admin.php?token=" . urlencode($token));
    //Stop execution
    exit;
}

//Close database connection
mysqli_close($conn);

?>