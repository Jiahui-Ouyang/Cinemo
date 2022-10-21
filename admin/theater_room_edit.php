<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require_once "../db_connect.php";

$id = $_GET['id'];
$movie = $conn->query("SELECT * FROM theater_room WHERE theater_room_id = $id");

if ($movie->num_rows != 1) {
	// redirect to show page
	header('room_type:theater_room_list.php');
	print_r($id);
	die('id is not in db');
}
$data = $movie->fetch_assoc();
// print_r($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Theater Owner Homepage</title>

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
				<a href="#" id="branding">
					<img src="../images/Cinemo Logo.JPG" alt="logo" class="logo" width="150">
				</a> <!-- #branding -->

				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="homephp">Home</a></li>
						<li class="menu-item"><a href="../signout.php">Log Out</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->
		</header>

	</div>
	<!-- .main-navigation -->


	<!-- Page content -->

	<!-- List of Movies Section -->
	<main class="main-content">
		<div class="container">
			<div class="page justify-content-center">
				<div class="row">
					<div class="title">
						<h1 class="w3-center">Theater room Edit Form</h1>
					</div>
					<form action="theater_room_modify.php?id=<?echo $id; ?>" method="POST">
						<div class="form-group" style="text-align: center; padding-left:15px">
							<label for="room_number" class="col-2">Theater room number</label>
							<input type="text" class="form-control" name="room_number" id="room_number" value="<?= $data['room_number'] ?>">
						</div>
						<div class="form-group" style="text-align: center; padding-left:15px">
							<label for="room_type" class="col-2">Theater room type</label>
							<input type="text" class="form-control" name="room_type" id="room_type" value="<?= $data['room_type'] ?>">
						</div>

						<div class="w3-center">
							<button type="submit" name="editForm" value="submit" class="btn btn-primary btn-block">Submit</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</main>

</body>

</html>