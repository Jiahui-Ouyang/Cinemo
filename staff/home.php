<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Theater Owner Homepage</title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

	<!-- Loading main css file -->
	<link rel="stylesheet" href="../css/style.css">

</head>


<body>
	<div id="site-content">
		<header class="site-header">
			<div class="container">
				<a href="#" id="branding">
					<img src="../images/Cinemo Logo.JPG" alt="logo" class="logo" width="150">
				</a> <!-- #branding -->

				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="home.php">Home</a></li>
						<li class="menu-item"><a href="../signout.php">Log Out</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->
		</header>

	</div>
	<!-- Page content -->
	<!-- Page content -->

	<!-- List of Movies Section -->
	<main class="main-content">
		<div class="container">
			<div class="page">
				<div class="row">
					<div class="w3-container w3-padding-32" id="latest movies">
						<div class="title">
							<h1 class="w3-center">Menu</h1>
							<h4 class="w3-center">Please Select the button</h4>
						</div>
						<div class="text-center">
							<div class="btn-group">
								<button onclick="document.location='theater_room_list.php'">Room Schedule Management</button>
								<button onclick="document.location='moviemanagement.php'">Movie Management</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	</div>

	</div> <!-- .container -->

	</div> <!-- .container -->

	</footer>
	</div>
	<!-- Default snippet for navigation -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>