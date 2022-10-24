<?php

// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
include('../head.php');
include('../header.php');
require_once "../db_connect.php";
$user_id = $_SESSION['userid'];
$sql = $conn->query("SELECT movies.title,movies.cover_img, book_history.book_history_id,room_schedule.movie_showdate,payment.seat_chosen FROM `book_history` JOIN payment JOIN room_schedule JOIN movies WHERE book_history.payment_ID = payment.payment_id AND payment.room_schedule_ID = room_schedule.room_schedule_id AND room_schedule.movie_idd = movies.movie_id AND payment.payer_id = $user_id;");


?>


<!DOCTYPE html>
<html lang="en">
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
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Homepage</title>

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
</div> <!-- .main-navigation -->

		<!-- .main-navigation -->

		<!-- Page content -->
		<div class="page-wrapper">
				
			
            <!-- Bread crumb -->
            
            
                    
                
			</div>
            
            <!-- End Bread crumb -->
            

            <!-- Container fluid  -->
            <div class="container-fluid">
				
			
                
                


					<div class="row ">
				
				<div class="card" id="latest movies">
						<div class="card-body">
						<div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://www.xmple.com/wallpaper/black-gradient-blue-linear-1920x1080-c2-0e1748-020307-a-330-f-14.svg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b>History</b></h1>
</div>
						</div>
							<div class="row">
							
							
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
										<h1 class="color-black mb-3 h1"><b><?= $row['movie_showdate'] ?></h1>
										<h5 class="w3-center">Seats booked:</h5>
										<h3 class="color-black mb-3 h3"><b><?= $row['seat_chosen'] ?></h3>
										<button onclick="document.location='reviews.php?id=<?= $row['book_history_id'] ?>'">User Reviews and Ratings</button>
										<button onclick="document.location='report_maintence.php?id=<?= $row['book_history_id'] ?>'">Feedback</button>
									</div>
								</div>
								</div>
							<?php } ?>

						</div> <!-- .container -->
						</main>
		<div class="card">
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
					
				
		
					
					


		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/plugins.js"></script>
		<script src="../js/app.js"></script>

</body>

</html>