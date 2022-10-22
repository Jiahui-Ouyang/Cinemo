<?php
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require "../db_connect.php";
$room_schedule_id = $_GET['id'];
$movie = "SELECT movies.title, movies.cover_img FROM `room_schedule` JOIN movies WHERE room_schedule.movie_idd = movies.movie_id AND room_schedule.room_schedule_id = $room_schedule_id;";
$result2 = mysqli_query($conn, $movie);
while ($rows = mysqli_fetch_array($result2)) {
	$moviename = $rows['title'];
	$img = $rows['cover_img'];
	break;
}
//echo "User id".$_SESSION['userid'];
$payer_id = $_SESSION['userid'];
?>

<script>
	var pp = parseInt(localStorage.getItem("pp"));
	const selectedSeats = localStorage.getItem("selectedSeats");
	var b = selectedSeats.split(',').map(function(item) {
		return parseInt(item);
	});
	// console.log("SELECTED SEATS: ", b);
	const Num = b.filter(Number);
	// console.log(Tt);
</script>

<?php
//$seat_chosen = '<script>document.writeln(Num); </script>';
//$price = '<script>document.writeln(pp); </script>';
// echo "Price CHOSEN  " . $price;
// $paymentsql = "INSERT INTO `payment`(`payer_id`, `room_schedule_ID`, `seat_chosen`, `total_price`, `payer_name`, `payer_card_number`, `card_exp`, `CVV`, `payment_status`) VALUES ('$payer_id','$room_schedule_id','$seat_chosen','$price','Unknown','1111-2222-3333-4444','2001-01-01','999','Pending')";
// mysqli_query($conn, $paymentsql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Cinemo Paymentpage</title>


	<!-- Loading third party fonts -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

	<!-- Loading main css file -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/seatingstyle.css">
	<link rel="stylesheet" href="../css/payment.css">

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

		<!-- .main-navigation -->

		<!-- Page content -->
		<!-- List of Movies Section -->
		<main class="main-content">
			<div class="container">
				<div class="page">
					<div class="row">
						<div class="title">
							<h1 class="w3-center">Payment</h1>
							<h2></h2>
							<h3 class="w3-center"><?php echo $moviename; ?></h3>
						</div>
						<img src="../images/<?php echo $img; ?>" alt="HTML5 Icon" style="width:300px;height:300px;" class="img-center">
					</div>

					<form action="send_payment.php?id=<?= $room_schedule_id ?>" method="POST">
						<div class="row">
							<div class="col-50">
								<?php
								if (isset($_SESSION["errors"])) {
									echo "<div name='Session_message'>";
									echo "<div class='alert alert-danger' role='alert'>";
									echo $_SESSION["errors"];
									echo "</div></div>";
									unset($_SESSION["errors"]);
								} ?>
								<h3 class="w3-center">Bank Card Information</h3>
								<label for="Total"> Total Price</label>
								<input type="number" id="totalprice" name="totalprice" value="0" readonly>
								<br></br>
								<label for="Total"> Seat selected</label>
								<input type="text" id="seatschosen" name="seatschosen" value="0" readonly>
								<script>
									updateprice();

									function updateprice() {
										var Price = pp;
										//console.log("PRICE", Price);
										document.getElementById("totalprice").value = Price;
									}
									updateseat();

									function updateseat() {
										var Seatschosen = Num;
										//console.log("N", selectedSeats);
										document.getElementById("seatschosen").value = Num;
									}
								</script>
								<?php //require_once "payment_pending.php";
								?>
								<br></br>
								<label for="email"><i class="fa fa-envelope"></i> Email</label>
								<input type="text" id="email" name="email" placeholder="john@example.com">
								<label for="fname">Accepted Cards</label>
								<div class="icon-container">
									<i class="fa fa-cc-visa" style="color:navy;"></i>
									<i class="fa fa-cc-amex" style="color:blue;"></i>
									<i class="fa fa-cc-mastercard" style="color:red;"></i>
									<i class="fa fa-cc-discover" style="color:orange;"></i>
								</div>
								<label for="cname">Name on Card</label>
								<input type="text" id="cname" name="cardname" placeholder="John More Doe">
								<label for="ccnum">Credit card number</label>
								<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" maxlength="16" style="width: 200px;">
								<label for="expmonth">Exp Time (Month/ Year)</label>
								<input type="month" id="exptime" name="exptime" placeholder="2022-10" min="2022-10" max="2030-10">
								<br></br>
								<div class="row">
									<div class="col-50">
										<label for="cvv">CVV</label>
										<input type="text" id="cvv" name="cvv" placeholder="352" maxlength="3" size="5" style="width: 60px;">
									</div>
								</div>
							</div>
						</div>
						<div class="btn-next">
							<button name="sendpayment" type="submit">Done</button>
						</div>
					</form>

				</div>

			</div> <!-- .container -->
		</main>
		<!-- Default snippet for navigation -->

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">About Us</h3>
							<p>Cinemo is a web application which used by a particular movie theater business. </p>
						</div>
					</div>
				</div>
				<div class="colophon">Copyright 2022 Cinemo</div>
			</div> <!-- .container -->

		</footer>


		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/plugins.js"></script>
		<script src="../js/app.js"></script>
</body>

</html>