<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
// Get the thailand current date
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");
//echo "Current date is " . $today;
require "../db_connect.php";
// Get the current showing movies query order by latest movies!
$now_movie = $conn->query("SELECT * FROM movies WHERE release_date <= '$today' ORDER BY release_date DESC");
// The coming soon movies query:
$coming_movie = $conn->query("SELECT * FROM movies WHERE release_date > '$today' ORDER BY release_date");


//echo "number: ".$num_coming_movie;

?>
<style>
	.movie-list .movie .release-date {
		color: orange;
		font-size: 20px;
	}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Homepage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- Loading third party fonts -->

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

		<!-- Page content -->
		<main class="main-content">
			<div class="container">
				<div class="page">
					<div class="row">
						<?php
						if (isset($_SESSION["message"])) {
							echo "<div name='Session_message'>";
							echo "<div class='alert alert-primary' role='alert'>";
							echo $_SESSION["message"];
							echo "</div></div>";
							unset($_SESSION["message"]);
						} ?>
						<div class="w3-container w3-padding-32" id="latest movies">
							<div class="title">
								<h1 class="w3-center">Latest Movies</h1>
							</div>
							<div class="movie-list">
								<?php while ($row = $now_movie->fetch_assoc()) {
									// if (mysqli_num_rows($row) > 0) {}
								?>
									<div class="movie">
										<figure class="movie-poster"><a href="movie_reservation.php?id=<?php echo $row['movie_id']; ?>"><img src="../images/<?php echo $row['cover_img'] ?>" alt="#" style="width:292px;height:420px;"></a></figure>
										<div class="text-center">
											<div class="movie-title"><a style="text-decoration: none;" href="movie_reservation.php?id=<?php echo $row['movie_id']; ?>"><?php echo $row['title']; ?></a></div>
										</div>
									</div>
								<?php
								}
								?>

							</div>
						</div>
						<br />
						<div class="w3-container w3-padding-32" id="latest movies">
							<div class="row">
								<div class="title">
									<h1 class="w3-center">Coming Movies</h1>
								</div>
							</div>
							<div class="movie-list">
								<?php while ($rows = $coming_movie->fetch_assoc()) {
									// if (mysqli_num_rows($row) > 0) {}
								?>
									<div class="movie">
										<figure class="movie-poster"><a href="movie_reservation.php?id=<?php echo $rows['movie_id']; ?>"><img src="../images/<?php echo $rows['cover_img'] ?>" alt="#" style="width:292px;height:420px;"></a></figure>
										<div class="text-center">
											<div class="movie-release-date"><i class="bi bi-clock"></i><?php echo $rows['release_date']; ?></div>
											<div class="movie-title"><a style="text-decoration: none;" href="movie_reservation.php?id=<?php echo $rows['movie_id']; ?>"><?php echo $rows['title']; ?></a></div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
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

		</footer>
	</div>
	<!-- Default snippet for navigation -->



	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/plugins.js"></script>
	<script src="../js/app.js"></script>

</body>

</html>