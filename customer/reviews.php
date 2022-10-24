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

// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
include('../head.php');
include('../header.php');
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
</div>


		<!-- List of Movies Section -->
		<div class="page-wrapper">
				
			
            <!-- Bread crumb -->
            
            
                    
                
			</div>
            
            <!-- End Bread crumb -->
            

            <!-- Container fluid  -->
            <div class="container-fluid">
				
			
                
                


					<div class="row ">
					
					<div class="card" id="latest movies">
						<div class="card-body">
						<button class="btn btn-dark btn-lg" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
						<form action="send_reviews.php?id=<?= $book_history_id ?>" method="POST">
						<div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://www.xmple.com/wallpaper/black-gradient-blue-linear-1920x1080-c2-0e1748-020307-a-330-f-14.svg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b><?= $data['title'] ?></b></h1>
</div>
						</div>
						<div class="row">
							<div class="title">
							
						
						
							
						</div>
						<img src="../images/<?= $data['cover_img'] ?>" alt="HTML5 Icon" style="width:300px;height:300px;" class="img-center">
						<h3 class="w3-center">Watching Date</h3>
						<h3 class="color-black mb-3 h1  text-center"><b><?= $data['movie_showdate'] ?></h3>
					</div>
					<h3 class="color-black mb-3 h1 "><b>Star Rating</b></h3>
					
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
						<br>
						<br>
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