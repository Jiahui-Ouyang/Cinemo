<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require_once "../db_connect.php";
$user_id = $_SESSION['userid'];
$sql = $conn->query("SELECT movies.title,movies.cover_img, book_history.book_history_id,room_schedule.movie_showdate,payment.seat_chosen FROM `book_history` JOIN payment JOIN room_schedule JOIN movies WHERE book_history.payment_ID = payment.payment_id AND payment.room_schedule_ID = room_schedule.room_schedule_id AND room_schedule.movie_idd = movies.movie_id AND payment.payer_id = $user_id;");


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Historypage</title>

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
						<li class="menu-item"><a href="../signout.php">Log Out</a></li>
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
							<h1 class="w3-center">History</h1>
						</div>
						<?php
						if (isset($_SESSION["messages"])) {
							echo "<div name='Session_message'>";
							echo "<div class='alert alert-primary' role='alert'>";
							echo $_SESSION["messages"];
							echo "</div></div>";
							unset($_SESSION["messages"]);
						} ?>
						<div class="movie-list">
							<?php while ($row = $sql->fetch_assoc()) {
							?>
								<div class="movie">
									<figure class="movie-poster"><img src="../images/<?php echo $row['cover_img']; ?>" alt="#"></figure>
									<div class="text-center">
										<h3><?= $row['title'] ?></h3>
										<h5 class="w3-center">Watching Date:</h5>
										<p class="w3-center"><?= $row['movie_showdate'] ?></p>
										<h5 class="w3-center">Seats booked:</h5>
										<p class="w3-center"><?= $row['seat_chosen'] ?></p>
										<button onclick="document.location='reviews.php?id=<?= $row['book_history_id'] ?>'">User Reviews and Ratings</button>
										<button onclick="document.location='report_maintence.php?id=<?= $row['book_history_id'] ?>'">Feedback</button>
									</div>
								</div>
							<?php } ?>

						</div> <!-- .container -->
						<!-- Default snippet for navigation -->
					</div>
				</div>
			</div>
		</main>
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">About Us</h3>
							<p>Cinemo is a web application which used by a particular movie theater business. </p>
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