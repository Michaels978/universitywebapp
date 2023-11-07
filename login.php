<?php

//Generate token
function generateToken() 
{
    return base64_encode(random_bytes(64));
}

session_start();
$_SESSION['token'] = generateToken();

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "images");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login
if (isset($_POST['submit'])) 
{
    //Find the email and password from the database 
    $sql = mysqli_query($conn, "SELECT * FROM login WHERE email='" . $_POST["email"] . "' AND password='" . $_POST["password"] . "'");

    //output email and password variable
    $output = mysqli_num_rows($sql);

    //If the email and password is the same, give access
    if ($output > 0) {
        $row = mysqli_fetch_array($sql);
        //Go back to the admin page with the token that was generated eailer
        header('Location: admin.php?token=' . urlencode($_SESSION['token']));
        //Stop execution
        exit();
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Ulster university tab icon-->
    <link rel="icon" type="image/jpg" href="img/ulsterlogo.jpg">

    <!--Bootstrap link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">

    <!--CSS Link-->
    <link rel="stylesheet" href="style.css">

    <!--Icon libary-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin</title>

</head>

<body>

    <!--Navagation Bar-->
    <nav class="navbar navbar-dark" style="background-color: darkblue;">
        <div class="container">

            <!--Home Page link-->
            <a href="home.html" class="navbar-brand mb-0 h1">Home Page</a>
            <!--Time Table Page link-->
            <a href="images.php" class="navbar-brand mb-0 h1">Time Tables</a>
            <!--About Page link-->
            <a href="about.html" class="navbar-brand mb-0 h1">About</a>
            <!--Admin Page link-->
            <a href="login.php" class="navbar-brand mb-0 h1">Admin</a>

        </div>
    </nav>

    <!--Title-->
    <div class="text-center p-5 display-1">
        <p>Admin Log In</p>
        <h5>Please Log In to access the Admin Page</h5>
    </div>

    <!--Email and Password-->
    <div class="bg-light loginborder text-center">

        <form method="POST">

            <div>
                <!--Label for inputting email-->
                <label for="email"></label>
                <input type="email" id="email" name="email" name="name" placeholder="Email Address" autocomplete="off"
                    class="form-control">
            </div>

            <!--Label for inputting password-->
            <div>
                <label for="password"></label>
                <input type="password" id="password" name="password" name="name" placeholder="Password"
                    autocomplete="off" class="form-control mb-3">
            </div>

            <!--Submit button-->
            <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>

        </form>

    </div>

    <!--Footer that is at the bottom of the page-->
    <footer class="bg-dark py-4 mt-5 fixed-bottom">

        <!--Chatbot intergration-->
        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <df-messenger intent="WELCOME" chat-title="chatbot" agent-id="fdbb484a-9b34-485a-a585-8a3e8934ea70"
            language-code="en"></df-messenger>

        <!--Code that centers the content within the footer-->
        <div class="container text-light text-center">

            <!--Title within the footer-->
            <p class="display-6 mb-3">We are here for you, there is always someone to talk to</p>

            <!--Social media links and their logos-->
            <div class="socialmedia">
                <a href="https://www.facebook.com/ulsteruniversity"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/ulsteruni/"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com/UlsterUni"><i class="fa fa-twitter"></i></a>
                <a href="https://www.youtube.com/@UlsterUniversityOfficial/videos"><i class="fa fa-youtube"></i></a>
            </div>

            <!--Sub title within the footer-->
            <small class="text-white-50">Contact for more help:</small>

            <!--Email addresses within the footer-->
            <div class="d-flex justify-content-center footeraddress">

                <address>
                    <p>Edwin Curran: <a href="mailto:ep.curran@ulster.ac.uk">ep.curran@ulster.ac.uk</a></p>
                </address>

                <address>
                    <p>Joseph Rafferty: <a href="mailto:j.rafferty@ulster.ac.uk">j.rafferty@ulster.ac.uk</a></p>
                </address>

                <address>
                    <p>Ian McChesney: <a href="mailto:ir.mcchesney@ulster.ac.uk">ir.mcchesney@ulster.ac.uk</a></p>
                </address>
            </div>

            <!--Address and phone number of ulster university-->
            <div class="d-flex justify-content-center addressphone">
                <p>Address: Ulster University, York St, Belfast BT15 1ED</p>
                <p>Phone Number: <a href="tel: 028 7012 3456">028 7012 3456</p>
            </div>

        </div>

    </footer>

</body>

</html>