<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";

require "../db_connect.php";
$cinema_id = $_GET['id'];


// Get the thailand current date and time used in the query to check latest schedule for the selected movie (by movie id)
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");
$time = date("H:i:s");
echo $today . "; Time: " . $time;

// $movie = "SELECT * FROM movies WHERE movie_id = $movie_id";
// $result = mysqli_query($conn, $movie);
// Select the room schedule accroding to the movie id and the showdate in the theater room

$cinema = "SELECT DISTINCT cinema.cinema_name, cinema.cinema_id FROM cinema JOIN room_schedule JOIN theater_room WHERE theater_room.theater_room_id=room_schedule.theater_room_idd AND theater_room.cinema_id = cinema.cinema_id AND cinema.cinema_id = $cinema_id AND (movie_showdate  > '$today' OR (movie_showdate = '$today' AND movie_showtime >= '$time'));";
// $room_schedule = "SELECT * FROM `cinema` JOIN theater_room JOIN room_schedule WHERE theater_room.theater_room_id=room_schedule.theater_room_idd AND theater_room.cinema_id = cinema.cinema_id AND room_schedule.movie_idd =$movie_id AND (movie_showdate  > '$today' OR (movie_showdate = '$today' AND movie_showtime >= '$time'));";
$result2 = mysqli_query($conn, $cinema);
// $result3 = mysqli_query($conn, $room_schedule);
while ($rows = mysqli_fetch_array($result2)) {
	$cinema_id = $rows['cinema_id'];
	$cinema_name = $rows['cinema_name'];
}
?>
<style>
	
</style>

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
							<h1><?= $cinema_name; ?></h1>
						</div>
						<img src="../images/<?= $imgsrc; ?>" alt="HTML5 Icon" style="width:300px;height:300px;" class="img-center">
						<h4 class="w3-center" style="padding-bottom: 30px;">Invitation</h4>
						<div class="timeslot">
							<div class="time">
								<h3>Theater Room 1</h3>
								<h4>Oct 25</h4>
								<div class="btn-group">
									<button class="selectTime" onclick="document.location='payment.php'">13:00</button>
									<button class="selectTime" onclick="document.location='payment.php'">14:00</button>
								</div>
							</div>
							<div class="time">
								<h3>Theater Room 1</h3>
								<h4>Oct 25</h4>
								<div class="btn-group">
									<button class="selectTime" onclick="document.location='payment.php'">13:00</button>
									<button class="selectTime" onclick="document.location='payment.php'">14:00</button>
								</div>
							</div>
							<div class="time">
								<h3>Theater Room 2</h3>
								<h4>Oct 25</h4>
								<div class="btn-group">
									<button class="selectTime" onclick="document.location='payment.php'">13:00</button>
									<button class="selectTime" onclick="document.location='payment.php'">14:00</button>
								</div>
							</div>
							<div class="time">
								<h3>Theater Room 3</h3>
								<h4>Oct 25</h4>
								<div class="btn-group">
									<button class="selectTime" onclick="document.location='payment.php'">13:00</button>
									<button class="selectTime" onclick="document.location='payment.php'">14:00</button>
								</div>
							</div>
						</div>



					</div>
				</div>
			</div>
		</main>
		<!-- Default snippet for navigation -->

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