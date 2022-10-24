<?php

// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
include('../head.php');
include('../header.php');
require "../db_connect.php";
$book_history_id = $_GET['id'];

$sql = "SELECT * FROM book_history JOIN payment JOIN room_schedule JOIN room_template JOIN theater_room JOIN movies WHERE book_history.payment_ID = payment.payment_id AND payment.room_schedule_ID = room_schedule.room_schedule_id AND room_schedule.theater_room_idd = theater_room.theater_room_id AND  room_template.theater_room_id= theater_room.theater_room_id AND room_schedule.movie_idd = movies.movie_id AND book_history.book_history_id = $book_history_id;";
// $sql = "SELECT room_template.*, room_schedule.seats_booked FROM room_schedule JOIN room_template JOIN theater_room WHERE theater_room.theater_room_id = room_template.theater_room_id AND theater_room.theater_room_id = room_schedule.theater_room_idd AND room_schedule.room_schedule_id = $room_schedule_id;";
$result = mysqli_query($conn, $sql);
// $movie = "SELECT movies.title, movies.cover_img FROM `room_schedule` JOIN movies WHERE room_schedule.movie_idd = movies.movie_id AND room_schedule.room_schedule_id = $room_schedule_id;";
// $result2 = mysqli_query($conn, $movie);
$seat_id_num = 0;

while ($row = mysqli_fetch_array($result)) {
    $theater_room_id = $row['theater_room_id']; // theater_room.theater_room_id
    $seat_booked = $row['seats_booked'];
    $seat_chosen = $row['seat_chosen']; // payment.seat_chosen

    //$split = explode(',', $seat_booked);
    $f_row_num = $row['f_row_num'];
    $f_column_num = $row['f_column_num'];
    // $f_seats_price = $row['f_seat_price'];
    $s_row_num = $row['s_row_num'];
    $s_column_num = $row['s_column_num'];
    // $s_seats_price = $row['s_seat_price'];

    // Stores in the session for sending to js
    $_SESSION['seats_booked'] = $seat_booked;
    $_SESSION['first_row_number'] = $f_row_num;
    $_SESSION['first_column_number'] = $f_column_num;
    // $_SESSION['first_seat_price'] = $f_seats_price;

    $_SESSION['second_row_number'] = $s_row_num;
    $_SESSION['second_column_number'] = $s_column_num;

    $moviename = $row['title'];
    $img = $row['cover_img'];
    // $_SESSION['second_seat_price'] = $s_seats_price;

    // Add the booking seat deta into the current seat_booked:
    //$seat_booked = $seat_booked.','.$booking_seat;
    //$seat_booked = $seat_booked.','.$seat_chosen;
    // echo $seat_booked;
    //$updatesql = "UPDATE room_schedule SET seats_booked = '$seat_booked' WHERE room_schedule_id = 1";
    //mysqli_query($conn, $updatesql);
    break;
}
// while ($rows = mysqli_fetch_array($result2)) {
//     $moviename = $rows['title'];
//     $img = $rows['cover_img'];
//     break;
// }
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
<style>
    .seat .chosen {
        background-color: #FF3D9E;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Cinemo Reporting Sytem</title>

    <!-- Loading third party fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Loading main css file -->
    <link rel="stylesheet" href="../css/style2.css">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/seatingstyle.css">
    <link rel="stylesheet" href="../css/payment.css">

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
                        <div class="card" id="latest movies">
						<div class="card-body">
                        <button class="btn btn-dark btn-lg" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
						<div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://www.xmple.com/wallpaper/black-gradient-blue-linear-1920x1080-c2-0e1748-020307-a-330-f-14.svg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b>Reporting Seating Issues</b></h1>
</div>
						</div>
							<div class="row">
							<div class="title">
                            
                            <h3 class="w3-center"><?php echo $moviename; ?></h3>
                        </div>
                        <img src="../images/<?php echo $img; ?>" alt="HTML5 Icon" style="width:300px;height:300px;" class="img-center">
                    </div>

                    <div class="movie-container">
                        <select id="movie">
                            <option value=""><?php echo $moviename; ?></option>
                        </select>
                    </div>

                    <ul class="showcase">
                        <li>
                            <div class="seat"></div>
                            <small>N/A</small>
                        </li>
                        <li>
                            <div class="seat selected"></div>
                            <small>Selected</small>
                        </li>
                        <li>
                            <div class="seat chosen"></div>
                            <small>Seats occupied by yourself</small>
                        </li>
                        <li>
                            <div class="seat occupied"></div>
                            <small>Occupied</small>
                        </li>
                    </ul>

                    <div class="movie-screen">
                        <img src='../images/screen.JPG' alt='screen' />
                    </div>

                    <div class="row-container">
                        <?php for ($r = 0; $r < $f_row_num; $r++) {
                        ?>
                            <div class="row justify-content-center" id="standard">
                                <?php for ($c = 0; $c < $f_column_num; $c++) {
                                    $seat_id_num++;
                                ?>
                                    <div class="seat" id="<?php echo $seat_id_num; ?>"></div>
                                <?php
                                } ?>
                            </div>
                        <?php
                        } ?>
                        <h5 class='subtitle'>-- Standard -- </h5>
                        <div class="row-container">
                            <?php
                            $seat_id_num = $f_row_num * $f_column_num;
                            for ($r = 0; $r < $s_row_num; $r++) {
                            ?>
                                <div class="row justify-content-center" id="luxury">
                                    <?php for ($c = 0; $c < $s_column_num; $c++) {
                                        $seat_id_num++;
                                    ?>
                                        <div class="seat" id="<?php echo $seat_id_num; ?>"></div>
                                    <?php
                                    } ?>
                                </div>
                            <?php
                            } ?>
                            <h5 class='subtitle'>-- Luxury --</h5>
                            <div class="text-center">
                                <div class="text-wrapper">
                                    <p class="text">Selected Seats <span id='count'>0</span>
                                    <p class="text">Total Price <span id="total">0</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button  onclick="document.location='payment.php?id=<?php echo $room_schedule_id; ?>'">Confirm</button>
                </div>




                <!-- <div class="text-wrapper">
        <p class="text">Selected Seats <span id='count'>0</span>
            <p class="text">Total Price ₹<span id="total">0</span></p>
    </div> -->
                <script>
                    const seat_booked = "<?php echo $_SESSION['seats_booked']; ?> ";
                    var first_row_number = parseInt("<?php echo $_SESSION['first_row_number']; ?>");
                    var first_column_number = parseInt("<?php echo $_SESSION['first_column_number']; ?>");
                    // var first_seat_price = parseInt("<?php echo $_SESSION['first_seat_price']; ?>");
                    var total_first_seats = first_column_number * first_row_number;

                    var second_row_number = parseInt("<?php echo $_SESSION['second_row_number']; ?>");
                    var second_column_number = parseInt("<?php echo $_SESSION['second_column_number']; ?>");
                    // var second_seat_price = parseInt("<?php echo $_SESSION['second_seat_price']; ?>");

                    //console.log("Fisrt : ", first_row_number, first_column_number, first_seat_price, );
                    //console.log("Second : ", second_row_number, second_column_number, second_seat_price);
                    //console.log("total-first-number : ", total_first_seats);
                    // Get the num list of seat_booked from php connecting to the database:

                    const array_seat_booked = seat_booked.split(",");
                    for (let i = 0; i < array_seat_booked.length; i++) {
                        var num = parseInt(array_seat_booked[i]);
                        // Make the number is the same as the seat_booked in database become occupied status (add the classname "occupied")
                        const occupiedSeats = document.getElementById(num);
                        occupiedSeats.classList.add("occupied");
                    }
                </script>
                <script src='report_maintence.js'></script>

                
                    <!-- Pass to the payment page according to what value? -->
                    
              
        </main>
    </div>
    </main>
    
    <!-- Default snippet for navigation -->

    <div class="card" id="latest movies">
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

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>

</body>

</html>