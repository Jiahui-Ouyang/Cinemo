<?php

// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
include('../head.php');
include('../header.php');

require "../db_connect.php";
$movie_id = $_GET['id'];



// Get the thailand current date and time used in the query to check latest schedule for the selected movie (by movie id)
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");
$time = date("H:i:s");
//echo $time;

$movie = "SELECT * FROM movies WHERE movie_id = $movie_id";
$result = mysqli_query($conn, $movie);
// Select the room schedule accroding to the movie id and the showdate in the theater room

$cinema = "SELECT DISTINCT cinema.cinema_name, cinema.cinema_id FROM `cinema` JOIN theater_room JOIN room_schedule WHERE theater_room.theater_room_id=room_schedule.theater_room_idd AND theater_room.cinema_id = cinema.cinema_id AND room_schedule.movie_idd =$movie_id AND (movie_showdate  > '$today' OR (movie_showdate = '$today' AND movie_showtime >= '$time'));";
$room_schedule = "SELECT * FROM `cinema` JOIN theater_room JOIN room_schedule WHERE theater_room.theater_room_id=room_schedule.theater_room_idd AND theater_room.cinema_id = cinema.cinema_id AND room_schedule.movie_idd =$movie_id AND (movie_showdate  > '$today' OR (movie_showdate = '$today' AND movie_showtime >= '$time'));";
$result2 = mysqli_query($conn, $cinema);
$result3 = mysqli_query($conn, $room_schedule);
?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="assets/js/calendar7.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/css/mdb.min.css" rel="stylesheet" />
<link href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/compiled-4.20.0.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />



<!-- Right now I'm using this boostrap (Major Changes) -->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/cascade-framework/1.5.0/css/core.min.css" rel="stylesheet" />-->



    


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo movie revervation</title>

	<!-- Loading third party fonts -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

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
</div>

		<!-- .main-navigation -->

		<!-- Page content -->

		<!-- List of Movies Section -->
		<div class="page-wrapper">
				
			
            <!-- Bread crumb -->
            
            
                    
                
			</div>
            
            <!-- End Bread crumb -->
            

            <!-- Container fluid  -->
            <div class="container-fluid">
				
			
                
                
			<div class="row">
			<div class="card" id="latest movies">
						<div class="card-body">
						<button class="btn btn-dark btn-lg" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
						<div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://www.xmple.com/wallpaper/black-gradient-blue-linear-1920x1080-c2-0e1748-020307-a-330-f-14.svg');
    height: 125px; width: auto;
  ">
  <?php
							while ($row = mysqli_fetch_array($result)) {
							?>
  <h1 class="color-white mb-3 h1"><b><?php echo $row['title']; ?></b></h1>
</div>
						</div>
							
							<div class="title">
						<!--<h1 class="color-black mb-3 h1"><b>Now Showing</b></h1>-->
							</div>
							<div class="movie-list row">
							
								
						</div>
						<img src="../images/<?php echo $row['cover_img']; ?>" alt="HTML5 Icon" style="width:300px;height:300px;" class="img-center">
						<h1 class="color-black mb-3 h1"><b>Description</b></h1>
						<p><h2 class="color-black mb-3 h4"><?php echo $row['description']; ?></h2></p>
					
						<h1 class="color-black mb-3 h1"><b>Genre</b></h1>
					<p><h1 class="color-black mb-3 h3"><?php echo $row['Genre'];
						?></h1></p>
					<h1 class="color-black mb-3 h1"><b>Release Date</b></h1>
					<p><h2 class="color-black mb-3 h4"><?php echo date("F j, Y", strtotime($row['release_date']));
							} ?></h2></p>
					<h1 class="color-black mb-3 h1"><b>Cinema</b></h1>
					
						<div class="card-body">

					<p><select name="cinema" id="get_cinema">
							<option value="">-- Please select cinema name --</option>
							<?php
							while ($rows = mysqli_fetch_array($result2)) {
								$cinema_id = $rows['cinema_id'];
								$cinema_name = $rows['cinema_name']; ?>
								<!-- Display cinema name here !-->
								<option value="<?php echo $cinema_id; ?>"><?php echo $cinema_name; ?></option>
							<?php
							}
							?>
						</select>
						<input type="number" id="SELECTED_CINEMA_ID">
						</p>
						<br />

						<h3>Time</h3>
						<div class="card-body" id="popular movies">
							<select name="get_schedule_time" id="get_schedule_time">
								<option value="please select movie theatre">--Please select a time--</option>
							</select>
							<br>
						</div>
						</div>
							
							<div class="btn-lg">
								<button class="btn-lg btn-dark" onclick="document.location='seats_reservation.php?id=<?php echo $room_schedule_id ?>'"><h3 class="color-white mb-1 h6"><b>Next</b></h3></button>
							</div>

						</div>
						</div>
						<div class="card" id="latest movies">
						<div class="card-body">
						</div>
							<h1 class="color-black mb-3 h1"><b>About Us</b></h1>
							<p>Cinemo is a web application which used by a particular movie theater business. </p>
							<p>Copyright 2022 Cinemo </p>
						</div>
					</div>
					</div>
					</div>
					</div>
					</div>
			
		
			
					


		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/plugins.js"></script>
		<script src="../js/app.js"></script>

</body>

</html>

<script>
								var length_schedule = document.getElementById("get_schedule_time").options.length;
								document.getElementById('get_cinema').addEventListener('change', function() {
									let CINEMA = this.value;
									console.log('Cinema selected: ', CINEMA);
									document.getElementById("SELECTED_CINEMA_ID").value = CINEMA;
									sessionStorage.setItem("cinemaSelected", CINEMA);
									document.cookie = "cinemaSelected="+CINEMA;
									// Check whether there are timeslots already

									<?php
									$get_cinema_id = $_SESSION["cinemaSelected"]; ?>
									// document.getElementById("SELECTED_CINEMA_ID").value = <?= $get_cinema_id ?>;

									// echo "<input type='number' id='cinema_Selected' value=".$get_cinema_id;<?php
																												$schedule = "SELECT room_schedule.room_schedule_id, room_schedule.movie_showdate, room_schedule.movie_showtime FROM room_schedule JOIN theater_room WHERE theater_room.cinema_id = $get_cinema_id AND theater_room.theater_room_id = room_schedule.theater_room_idd AND room_schedule.movie_idd =$movie_id AND (room_schedule.movie_showdate > '$today' OR (room_schedule.movie_showdate = '$today' AND room_schedule.movie_showtime >= '$time'));";
																												$result4 = mysqli_query($conn, $schedule);
																												while ($ROW = mysqli_fetch_array($result4)) {
																													$room_schedule_id = $ROW['room_schedule_id'];
																													$movie_date = $ROW['movie_showdate'];
																													$movie_time = $ROW['movie_showtime']; ?>
									document.getElementById("get_schedule_time").innerHTML = "<option value='<?php
																													echo $room_schedule_id;
																												?>'><?php echo $movie_date . "  Time:  " . $movie_time; ?></option>";
								<?php
																												} ?>


								});
							</script>