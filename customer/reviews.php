<style>
	@import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css);

	.rating-wrap {
		max-width: 500px;
		margin: auto;
		padding: 15px;
		box-shadow: 0 0 3px 0 rgba(0, 0, 0, .2);
		text-align: center;
	}

	#rating-value {
		width: 110px;
		margin: 40px auto 0;
		padding: 10px 5px;
		text-align: center;
		box-shadow: inset 0 0 2px 1px rgba(46, 204, 113, .2);
	}

	/*styling star rating*/
	.rating {
		border: none;
		float: left;
	}

	.rating>input {
		display: none;
	}

	.rating>label:before {
		content: '\f005';
		font-family: FontAwesome;
		margin: 5px;
		font-size: 1.5rem;
		display: inline-block;
		cursor: pointer;
	}

	.rating>.half:before {
		content: '\f089';
		position: absolute;
		cursor: pointer;
	}


	.rating>label {
		color: #ddd;
		float: right;
		cursor: pointer;
	}

	.rating>input:checked~label,
	.rating:not(:checked)>label:hover,
	.rating:not(:checked)>label:hover~label {
		color: #2ce679;
	}

	.rating>input:checked+label:hover,
	.rating>input:checked~label:hover,
	.rating>label:hover~input:checked~label,
	.rating>input:checked~label:hover~label {
		color: #2ddc76;
	}
</style>
<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require "../db_connect.php";
//$_SESSION["userid"] = 4;
$user_id = $_SESSION['userid'];
$book_history_id = $_GET['id'];
// $review = "SELECT * FROM `review` JOIN book_history JOIN payment JOIN room_schedule JOIN movies 
// WHERE review.user_idd = $user_id AND review.book_history_idd = $book_history_id AND review.book_history_idd = book_history.book_history_id AND book_history.payment_ID = payment.payment_id AND payment.room_schedule_ID = room_schedule.room_schedule_id AND room_schedule.movie_idd = movies.movie_id;";
// $query_run = mysqli_query($conn, $review);
// $data = $query_run->fetch_assoc(); 
$sql = $conn->query("SELECT movies.title,movies.cover_img,room_schedule.movie_showdate FROM `book_history` JOIN payment JOIN room_schedule JOIN movies WHERE book_history.payment_ID = payment.payment_id AND payment.room_schedule_ID = room_schedule.room_schedule_id AND room_schedule.movie_idd = movies.movie_id AND payment.payer_id = $user_id;");
$data = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Homepage</title>

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


		<!-- List of Movies Section -->
		<main class="main-content">
			<div class="container">
				<div class="page">
					<div class="row">
						<?php ?>
						<div class="title">
							<h1 class="w3-center">User Reviews and Ratings</h1>
							<h3 class="w3-center"><?= $data['title'] ?></h3>
						</div>
						<img src="../images/<?= $data['cover_img'] ?>" alt="HTML5 Icon" style="width:300px;height:300px;" class="img-center">
						<h3 class="w3-center">Watching Date</h3>
						<p class="w3-center"><?= $data['movie_showdate'] ?></p>
					</div>
					<h3>Star Rating</h3>
					<form action="send_reviews.php?id=<?= $book_history_id ?>" method="POST">
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label for="star5" class="full" title="Awesome"></label>
							<input type="radio" id="star4.5" name="rating" value="4.5" /><label for="star4.5" class="half"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label for="star4" class="full"></label>
							<input type="radio" id="star3.5" name="rating" value="3.5" /><label for="star3.5" class="half"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label for="star3" class="full"></label>
							<input type="radio" id="star2.5" name="rating" value="2.5" /><label for="star2.5" class="half"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label for="star2" class="full"></label>
							<input type="radio" id="star1.5" name="rating" value="1.5" /><label for="star1.5" class="half"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label for="star1" class="full"></label>
							<input type="radio" id="star0.5" name="rating" value="0.5" /><label for="star0.5" class="half"></label>
						</fieldset>
						<h4 id="rating-value"></h4>
						<script src="star-ratings.js"></script>
						<h3>Reviews</h3>
						<input class="w3-input w3-section w3-border" type="text" placeholder="Review" name="Review">
						<button name="givereviews" type="submit">Submit</button>
					</form>
				</div>

			</div>
		</main>

	</div>
</body>




<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/plugins.js"></script>
<script src="../js/app.js"></script>

</body>

</html>