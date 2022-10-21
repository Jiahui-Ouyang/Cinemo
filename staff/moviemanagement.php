<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
include('../db_connect.php');
?>
<style>
	a
	{
		box-shadow: inset 0 0 0 0 #54b3d6;
		color: #54b3d6;
		margin: 0 -.25rem;
		padding: 0 .25rem;
		transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
	}

	a:hover {
		box-shadow: inset 100px 0 0 0 #54b3d6;
		color: white;
	}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Movie Management</title>

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
					<div class="w3-container w3-padding-150" id="Menu">
						<a href='home.php' class="">Back</a>
						<div class="title">
							<h1 class="w3-center">Movie Management</h1>
						</div>
					</div>
					<div class="position-relative h-100">
						<div class="btn-addcinema">
							<button onclick="location.href='movie_add.php'" type="button">Add New Movie</button>
						</div>
					</div>

					<div class="container-fluid">
						<?php
						if (isset($_SESSION['status'])) {
							echo $_SESSION['status'];
							unset($_SESSION['status']);
						};
						?>
					</div>
					<table class>
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Cover</th>
								<th class="text-center">Title</th>
								<th class="text-center">Genre</th>
								<th class="text-center">Description</th>
								<th class="text-center">Release Date</th>
								<th colspan="2" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							$movie = $conn->query("SELECT * FROM movies ORDER BY release_date");
							while ($row = $movie->fetch_assoc()) {
								$duration_min = explode('.', $row['duration'])[1];
								$k = 0;
								$duration_min = floor(($k . '.' . $duration_min) * 60);
							?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><img src="../images/<?php echo $row['cover_img'] ?>" alt=""></td>
									<td><?php echo ucwords($row['title']) ?></td>
									<td><?php echo ucwords($row['Genre']) ?></td>
									<td><?php echo floor($row['duration']) ?>h
										<?php if ($duration_min != 0) {
											echo $duration_min;
											echo "min";
										} ?></td>
									<td><?php echo ucwords($row['release_date']) ?></td>
									<td>
										<button type="button" name="" value="" onclick="location.href='movie_edit.php?id=<?php echo $row['movie_id']; ?>'">Edit</a>
									</td>
									<td>
										<button class="delete" type="button" name="" value="" onclick="location.href='movie_del.php?id=<?php echo $row['movie_id']; ?>'"> Delete</a>
									</td>
				</div>
				</td>
			<?php
							} ?>
			</tbody>
			</table>
			</div>
		</div>
	</main>

	<script>

	</script>


	<script src="assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>