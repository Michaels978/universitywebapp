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

    <!--Name on tab-->
    <title>Time Tables</title>

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
        <p>Time Tables</p>
    </div>

    <!--Search button-->
    <form method="post" class="text-center">
        <label>Search:</label>
        <input type="text" name="search" autocomplete="off">
        <input type="submit" name="submit">
    </form>

    <!--Searching timetable based on name-->
    <div class="container mt-5 col-md-12 card card-body">

        <?php
        //Database connection is made
        $conn = mysqli_connect("localhost", "root", "", "images");

        //if the user clicks the submit button
        if (isset($_POST["submit"])) {
            $str = $_POST["search"];
            $sth = $conn->prepare("SELECT * FROM table1 WHERE name = ?");
            $sth->bind_param("s", $str);
            $sth->bind_result($id, $name, $filename);
            $sth->execute();

            if ($row = $sth->fetch()) {

                ?>
                <!--table is made and all the text is centered-->
                <table class="table text-center">
                    <thead>
                        <tr>
                            <!--Course title in table-->
                            <th>Course</th>
                            <!--Timetable title in table-->
                            <th>Timetable</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <td>
                                <!--Output name-->
                                <?php echo $name; ?>
                            </td>

                            <td>
                                <!--Output image-->
                                <img src="<?php echo "img/" . $filename; ?>" width="600px" alt="Image">
                            </td>

                            <!--Download button for searched result-->
                            <td class="align-middle">
                                <a class="btn btn-primary" href="<?php echo "img/" . $filename; ?>" download>Download</a>
                            </td>

                        </tr>
                    </tbody>

                </table>

                <?php

            //If there is no timetable found, output that there is no timetable found and center it
            } else {
                echo "<div style = 'text-align: center;'>Course timetable can't be found</div>";
            }
        }

        ?>

    </div>



    <!--Crad that the timetables are in: ID, Course, and Timetable-->
    <div class="container mt-5 col-md-12 card card-body">

        <?php

        //connecting the database to the webpage to localhost
        $conn = mysqli_connect("localhost", "root", "", "images");

        $query = "SELECT * FROM table1";
        $query_run = mysqli_query($conn, $query);

        ?>

        <!--Table that is created-->
        <table class="table">

            <thead>
                <!--Content of columns within the table-->
                <tr>
                    <th>Course</th>
                    <th>Timetable</th>
                </tr>
            </thead>

            <!--The body of the table that consits of the content from the database-->
            <tbody>
                <?php
                if (mysqli_num_rows($query_run) > 0) //If there is rows, run the query
                {
                    foreach ($query_run as $row) //For each row that is shown, echo the id, name, and image (timetable)
                    {
                        ?>
                        <tr>

                            <!--Output name-->
                            <td>
                                <?php echo $row['name']; ?>
                            </td>

                            <!--Output image-->
                            <td>
                                <img src="<?php echo "img/" . $row['filename']; ?>" width="600px" alt="Image">
                            </td>

                            <!--Download button-->
                            <td class="align-middle">
                                <a class="btn btn-primary" href="<?php echo "img/" . $row['filename']; ?>" download>Download</a>
                            </td>

                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>

        </table>       

    </div>

    

    <!--Linking java scrpit for the back to top button-->
    <script src="top.js"></script>

    <!--Go back to the top of the page button-->
    <a href="#" class="top"><i style="text"></i>^</a>
    



    <!--Footer that is at the bottom of the page-->
    <footer class="bg-dark py-4 mt-5 bottom">

        <!--Chatbot intergration-->
        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <df-messenger intent="WELCOME" chat-title="chatbot" agent-id="fdbb484a-9b34-485a-a585-8a3e8934ea70"
            language-code="en"></df-messenger>

        <!--Code that centers the content within the footer-->
        <div class="container text-light text-center">

            <!--Title within the footer-->
            <p class="display-6 mb-3">We are here for you, there is always someone to talk to</p>

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