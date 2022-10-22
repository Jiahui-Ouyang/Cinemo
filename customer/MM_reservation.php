<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";

require "../db_connect.php";
$movie_id = $_GET['id'];


// Get the thailand current date and time used in the query to check latest schedule for the selected movie (by movie id)
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");
$time = date("H:i:s");
echo $today . "; Time: " . $time;

$movie = "SELECT * FROM movies WHERE movie_id = $movie_id";
$result = mysqli_query($conn, $movie);
// Select the room schedule accroding to the movie id and the showdate in the theater room

$cinema = "SELECT DISTINCT cinema.cinema_name, cinema.cinema_id FROM room_schedule JOIN theater_room JOIN cinema WHERE theater_room.theater_room_id=room_schedule.theater_room_idd AND theater_room.cinema_id = cinema.cinema_id AND room_schedule.movie_idd =$movie_id AND (movie_showdate  > '$today' OR (movie_showdate = '$today' AND movie_showtime >= '$time'));";
// $room_schedule = "SELECT * FROM `cinema` JOIN theater_room JOIN room_schedule WHERE theater_room.theater_room_id=room_schedule.theater_room_idd AND theater_room.cinema_id = cinema.cinema_id AND room_schedule.movie_idd =$movie_id AND (movie_showdate  > '$today' OR (movie_showdate = '$today' AND movie_showtime >= '$time'));";
$result2 = mysqli_query($conn, $cinema);
// $result3 = mysqli_query($conn, $room_schedule);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Cinemo Homepage</title>

    <!-- Loading third party fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Loading main css file -->
    <link rel="stylesheet" href="../css/style.css">

    <!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

</head>


<body>
    <div id="site-content">
        <header class="site-header">
            <div class="container">
                <a href="index.html" id="branding">
                    <img src="../images/Cinemo Logo.JPG" alt="logo" class="logo" width="150">
                </a> <!-- #branding -->

                <div class="main-navigation">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item"><a href="home.php">Home</a></li>
                        <li class="menu-item"><a href="aboutpage.php">About</a></li>
                        <li class="menu-item"><a href="allmovies.php">Movies</a></li>
                        <li class="menu-item"><a href="historypage.php">History</a></li>
                        <li class="menu-item"><a href="signin.php">Log Out</a></li>
                    </ul> <!-- .menu -->
                </div> <!-- .main-navigation -->
        </header>

        <!-- .main-navigation -->

        <!-- Page content -->
        <!-- List of Movies Section -->
        <main class="main-content">
            <div class="container">
                <div class="page">
                    <div class="row">
                        <div class="title">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <h1><?php echo $row['title']; ?></h1>
                        </div>
                        <img src="../images/<?php echo $row['cover_img']; ?>" alt="HTML5 Icon" style="width:300px;height:380px;">
                        <div class="col">
                            <h3>Release Date</h3>
                            <p><?php echo date("F j, Y", strtotime($row['release_date']));
                                ?></p>
                            <h3>Genre</h3>
                            <p><?php echo $row['Genre']; ?></p>
                            <h3>Description</h3>
                            <p><?php echo $row['description'];
                                break;
                            } ?></p>
                            <p>

                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="cinema-padding" style="margin-top: 30px;">
                            <h3>Cinema</h3>

                            <form action="">
                                <select name="cinema" id="get_cinema">
                                    <option value="please select movie theatre"> -- Please Select Cinema -- </option>
                                    <?php
                                    while ($rows = mysqli_fetch_array($result2)) {
                                        $cinema_id = $rows['cinema_id'];
                                        $cinema_name = $rows['cinema_name'];
                                        print_r($rows); ?>
                                        <!-- Display cinema name here !-->
                                        <option value="<?php echo $cinema_id; ?>"><?php echo $cinema_name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <br><br>
                        </div>
                        <div class="btn-next">
                            <button onclick="document.location='timeslots.php?id=<?= $cinema_id; ?>&m_id<?= $movie_id; ?>'">Next</button>
                        </div>
                        </form>
                    </div>
                </div> <!-- .container -->
            </div>
            <!-- Default snippet for navigation -->
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="widget">
                            <h3 class="widget-title">About Us</h3>
                            <p>Cinemo is a web application which used by a particular movie theater business.</p>
                        </div>
                    </div>
                </div>
                <div class="colophon">Copyright 2022 Cinemo</div>
            </div> <!-- .container -->
        </footer>




        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/app.js"></script>

</body>

</html>