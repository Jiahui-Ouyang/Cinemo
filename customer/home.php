
<?php 
//session_start();
//include('../constant/check.php');
date_default_timezone_set("Asia/Bangkok"); ?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="assets/js/calendar7.js"></script>


<!-- Delete if necessary  
<link href="css/fullcalendar.css" rel="stylesheet" />

<link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />

<script src="js/moment.min.js"></script>

<script src="js/fullcalendar.js"></script>-->



<!-- Right now I'm using this boostrap  -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/css/mdb.min.css" rel="stylesheet" />
<link href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/compiled-4.20.0.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />



<!-- Right now I'm using this boostrap (Major Changes) -->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/cascade-framework/1.5.0/css/core.min.css" rel="stylesheet" />-->



    


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<?php

// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
include('../head.php');
include('../header.php');
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

	<title class="title">Cinemo Homepage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- Loading third party fonts -->

	<!-- Loading main css file -->
	<link rel="stylesheet" href="../css/style2.css">
	<link rel="stylesheet" href="../css/style.css">
	<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
</head>


<body>

	
		<header class="site-header">
			<div class="container">
				<a href="index.html" id="branding">
					<img src="../images/Cinemo_Logo.png" alt="logo" class="logo" width="150" height="150">
				</a> <!-- #branding -->

				
		</header>

		<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="home.php">Home</a></li>
						<li class="menu-item"><a href="aboutpage.php">About</a></li>
						<li class="menu-item"><a href="allmovies.php">Movies</a></li>
						<li class="menu-item"><a href="historypage.php">History</a></li>
						<li class="menu-item"><a href="../signout.php">Log Out</a></li>
					</ul> <!-- .menu -->
				</div>
</div> <!-- .main-navigation -->

		<!-- Page content -->
		
            <!-- Bread crumb -->
            
			
			<div class="page-wrapper">
				
			
            <!-- Bread crumb -->
            
            
                    
                
			</div>
            
            <!-- End Bread crumb -->
            

            <!-- Container fluid  -->
            <div class="container-fluid">
				
			
                
                


					<div class="row ">
						<?php
						if (isset($_SESSION["message"])) {
							echo "<div name='Session_message'>";
							echo "<div class='alert alert-primary' role='alert'>";
							echo $_SESSION["message"];
							echo "</div></div>";
							unset($_SESSION["message"]);
						} ?>
						
						<div class="card" id="latest movies">
						<div class="card-body">
						<div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://www.xmple.com/wallpaper/black-gradient-blue-linear-1920x1080-c2-0e1748-020307-a-330-f-14.svg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b>Now Showing</b></h1>
</div>
						</div>
							<div class="row">
							<div class="title">
						<!--<h1 class="color-black mb-3 h1"><b>Now Showing</b></h1>-->
							</div>
							<div class="movie-list row">
								<?php while ($row = $now_movie->fetch_assoc()) {
									// if (mysqli_num_rows($row) > 0) {}
								?>
									<div class="movie">
										<figure class="movie-poster"><a href="movie_reservation.php?id=<?php echo $row['movie_id']; ?>"><img src="../images/<?php echo $row['cover_img'] ?>" alt="#" style="width:292px;height:420px;"></a></figure>
										<div class="text-left">
											<div class="movie-title"><a style="text-decoration: none;" href="movie_reservation.php?id=<?php echo $row['movie_id']; ?>"><?php echo $row['title']; ?></a></div>
										</div>
									</div>
									
									
								<?php
								}
								?>

							</div>
							
			</div>
			</div>
			
			
						
						
						<div class="card" id="latest movies">
						<div class="card-body">
						</div>
							
							<div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://www.xmple.com/wallpaper/black-gradient-blue-linear-1920x1080-c2-0e1748-020307-a-330-f-14.svg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b>Coming Soon</b></h1>
</div>
<div class="row">
							<div class="movie-list">
								<?php while ($rows = $coming_movie->fetch_assoc()) {
									// if (mysqli_num_rows($row) > 0) {}
								?>
									<div class="movie">
										<figure class="movie-poster"><a href="movie_reservation.php?id=<?php echo $rows['movie_id']; ?>"><img src="../images/<?php echo $rows['cover_img'] ?>" alt="#" style="width:292px;height:420px;"></a></figure>
										<div class="text-left">
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
							<div class="card" id="latest movies">
						<div class="card-body">
						</div>
							<h1 class="color-black mb-3 h1"><b>About Us</b></h1>
							<p>
							<h3 class="color-black mb-3 h6">Cinemo is a web application which used by a particular movie theater business. </h3></p>
							<h3 class="color-black mb-3 h6">Copyright 2022 Cinemo
						</div>
					</div>
					</div>
					</div>
					</div>
					</div>
			
		</main>


		
	
	<!-- Default snippet for navigation -->



	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/plugins.js"></script>
	<script src="../js/app.js"></script>
	<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>

</body>

</html>