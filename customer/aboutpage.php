<?php

// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
include('../head.php');
include('../header.php');

?>
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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Aboutpage</title>

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
				
			
                
                


					<div class="row ">
						<div class="w3-container w3-padding-32" id="latest movies">
						<div class="card" id="latest movies">
						<div class="card-body">
							
</div>
<!-- Background image -->
<h1 class="color-black mb-3 h1"><b>About Us</b></h1>
<br>
							
							<h3 class="introduction">Introduction</h3>
							<p2 class="paragraph">Cinemo is a web application which used by a particular movie theater business. Cinemo allows the users who want to watch movies at the cinema hall by booking the tickets.
								The user can give a rating and review the movie that they watched. In addition, Cinemo integrates a social feature which the user can share their booking ticket with their friends. </p2>
							<h3 class="objectives">Objectives</h3>
							<p2 class="paragraph2">The main objective of Cinemo is to provide the customers convenience for choosing and booking the movie ticket online via a web application rather than going to the movie theatres physically which is time consuming and impractical.</p2>
						
					

			</div> <!-- .container -->

		</main>
		
			
	</div>
	<!-- Default snippet for navigation -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>