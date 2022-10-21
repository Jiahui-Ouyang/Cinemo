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

	<title>Cinemo Cinema Management</title>

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
						<li class="menu-item"><a href="home.php">Home</a></li>
						<li class="menu-item"><a href="../signout.php">Log Out</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->
		</header>

		<?php
		require_once "../db_connect.php";

		$id = $_GET['id'];
		$movie = $conn->query("SELECT * FROM cinema WHERE cinema_id = $id");

		if ($movie->num_rows != 1) {
			// redirect to show page
			header('location:cinemamanagement.php');
			print_r($id);
			die('id is not in db');
		}
		$data = $movie->fetch_assoc();
		// print_r($data);

		?>


		<!DOCTYPE html>
		<html lang="en">
		<!-- Page content -->
		<!-- List of Movies Section -->
		<main class="main-content">
			<div class="container">
				<div class="page">
					<div class="row">
						<a href='cinemamanagement.php'>Back</a>

						<body>
							<div class>
							</div>
							<div class>
								<div class>
									<form action="cinema_modify.php?id=<?= $id ?>" method="POST">
										<h1 class="w3-center">Edit Cinema Infromation</h1>
										<div class="form-group" style="text-align: center; padding-left:15px">
											<label for="cinema_name" class="col-1 col-form-control">Cinema Name</label>
											<input type="text" class="form-control" name="cinema_name" id="cinema_name" value="<?= $data['cinema_name'] ?>">
										</div>
										<div class="form-group" style="text-align: center; padding-left:30px">
											<label for="location" class="col-1 col-form-control">Cinema Location</label>
											<input type="text" class="form-control" name="location" id="location" value="<?= $data['location'] ?>">
										</div>
										<div class="text-center">
											<button type="submit" name="editForm" value="" class="btn btn-primary btn-block">Submit</button>
										</div>
									</form>
								</div> <!-- .container -->

							</div> <!-- .container -->
					</div>
				</div>
			</div>
		</main>

</body>

</html>