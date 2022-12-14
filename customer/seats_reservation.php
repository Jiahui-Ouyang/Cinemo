<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require "../db_connect.php";
$room_schedule_id = $_GET['id'];
$sql = "SELECT room_template.*, room_schedule.seats_booked FROM room_schedule JOIN room_template JOIN theater_room WHERE theater_room.theater_room_id = room_template.theater_room_id AND theater_room.theater_room_id = room_schedule.theater_room_idd AND room_schedule.room_schedule_id = $room_schedule_id;";
$result = mysqli_query($conn, $sql);
$movie = "SELECT movies.title, movies.cover_img FROM `room_schedule` JOIN movies WHERE room_schedule.movie_idd = movies.movie_id AND room_schedule.room_schedule_id = $room_schedule_id;";
$result2 = mysqli_query($conn, $movie);
$seat_id_num = 0;
$alphabet = range('A', 'Z');

while ($row = mysqli_fetch_array($result)) {
    $seat_booked = $row['seats_booked'];
    $seat_maintenance = $row['seats_maintenance'];
    //$split = explode(',', $seat_booked);
    $f_row_num = $row['f_row_num'];
    $f_column_num = $row['f_column_num'];
    $f_seats_price = $row['f_seat_price'];
    $s_row_num = $row['s_row_num'];
    $s_column_num = $row['s_column_num'];
    $s_seats_price = $row['s_seat_price'];


    // Stores in the session for sending to js
    $_SESSION['seats_booked'] = $seat_booked;
    $_SESSION['seats_maintenance'] = $seat_maintenance;
    $_SESSION['first_row_number'] = $f_row_num;
    $_SESSION['first_column_number'] = $f_column_num;
    $_SESSION['first_seat_price'] = $f_seats_price;

    $_SESSION['second_row_number'] = $s_row_num;
    $_SESSION['second_column_number'] = $s_column_num;
    $_SESSION['second_seat_price'] = $s_seats_price;

    // Add the booking seat deta into the current seat_booked:
    //$seat_booked = $seat_booked.','.$booking_seat;
    //$seat_booked = $seat_booked.','.$seat_chosen;
    // echo $seat_booked;
    //$updatesql = "UPDATE room_schedule SET seats_booked = '$seat_booked' WHERE room_schedule_id = 1";
    //mysqli_query($conn, $updatesql);
    break;
}
while ($rows = mysqli_fetch_array($result2)) {
    $moviename = $rows['title'];
    $img = $rows['cover_img'];
    break;
}
?>
<style>
    td {
        font-family: 'Inter', sans-serif;
        font-size: calc(.6rem + .4vw);
        margin-right: 10px;
        /* font-size: 14px; */
        font-family: helvetica, arial, tahoma;
        font-weight: bold;
    }
</style>
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Cinemo Seat Reservation</title>

    <!-- Loading third party fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Loading main css file -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/seatingstyle.css">
    <!-- <link rel="stylesheet" href="../css/payment.css"> -->

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
                            <h1 class="w3-center">Seating Reservation</h1>
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
                            <div class="seat maintenance"></div>
                            <small>Under Maintenance</small>
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
                                <td id="alaphabet"><?php echo $alphabet[$r]; ?></td>
                                <?php for ($c = 0; $c < $f_column_num; $c++) {
                                    $seat_id_num++;
                                ?>
                                    <div class="seat" id="<?php echo $seat_id_num; ?>"></div>
                                <?php
                                } ?>
                                <td><?php echo $alphabet[$r]; ?></td>
                            </div>
                        <?php
                        } ?>
                        <br />
                        <h5 class='subtitle'>Standard - <?php echo $f_seats_price; ?> Baht</h5>
                        <div class="row-container">
                            <?php
                            $seat_id_num = $f_row_num * $f_column_num;
                            for ($r = 0; $r < $s_row_num; $r++) {
                            ?>
                                <div class="row justify-content-center" id="luxury">
                                    <td><?php echo $alphabet[$r + $f_row_num]; ?></td>
                                    <?php for ($c = 0; $c < $s_column_num; $c++) {
                                        $seat_id_num++;
                                    ?>
                                        <div class="seat" id="<?php echo $seat_id_num; ?>"></div>
                                    <?php
                                    } ?>
                                    <td><?php echo $alphabet[$r + $f_row_num]; ?></td>
                                </div>
                            <?php
                            } ?>
                            <br />
                            <h5 class='subtitle'>Luxury - <?php echo $s_seats_price; ?> Baht</h5>
                            <div class="text-center">
                                <div class="text-wrapper">
                                    <p class="text">Selected Seats <span id='count'>0</span>
                                    <p class="text">Total Price <span id="total">0</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>




                <!-- <div class="text-wrapper">
        <p class="text">Selected Seats <span id='count'>0</span>
            <p class="text">Total Price ???<span id="total">0</span></p>
    </div> -->
                <script>
                    const seat_booked = "<?php echo $_SESSION['seats_booked']; ?> ";
                    const seat_maintenance = "<?php echo $_SESSION['seats_maintenance']; ?> ";
                    var first_row_number = parseInt("<?php echo $_SESSION['first_row_number']; ?>");
                    var first_column_number = parseInt("<?php echo $_SESSION['first_column_number']; ?>");
                    var first_seat_price = parseInt("<?php echo $_SESSION['first_seat_price']; ?>");
                    var total_first_seats = first_column_number * first_row_number;

                    var second_row_number = parseInt("<?php echo $_SESSION['second_row_number']; ?>");
                    var second_column_number = parseInt("<?php echo $_SESSION['second_column_number']; ?>");
                    var second_seat_price = parseInt("<?php echo $_SESSION['second_seat_price']; ?>");

                    //console.log("Fisrt : ", first_row_number, first_column_number, first_seat_price, );
                    //console.log("Second : ", second_row_number, second_column_number, second_seat_price);
                    //console.log("total-first-number : ", total_first_seats);

                    function isEmptyOrSpaces(str) {
                        return str === null || str.match(/^ *$/) !== null;
                    }

                    if (isEmptyOrSpaces(seat_maintenance)) {
                        console.log("No seats in maintenance!");
                    } else {
                        const array_seat_maintenance = (seat_maintenance.split(","));
                        for (let i = 0; i < array_seat_maintenance.length; i++) {
                            var num = parseInt(array_seat_maintenance[i]);
                            // Make the number is the same as the seat_booked in database become occupied status (add the classname "occupied")
                            const maintenanceSeats = document.getElementById(num);
                            maintenanceSeats.classList.add("maintenance", "occupied");

                        }
                    }


                    // Get the num list of seat_booked from php connecting to the database:
                    if (isEmptyOrSpaces(seat_booked)) {
                        console.log("No seats in occupied!");
                    } else {
                        const array_seat_booked = seat_booked.split(",");
                        for (let n = 0; n < array_seat_booked.length; n++) {
                            var Num = parseInt(array_seat_booked[n]);
                            // Make the number is the same as the seat_booked in database become occupied status (add the classname "occupied")
                            const occupiedSeats = document.getElementById(Num);
                            occupiedSeats.classList.add("occupied");
                        }
                    }
                </script>
                <script src='seats-reservation.js'></script>

                <div class="btn-next">

                    <!-- Pass to the payment page according to what value? -->
                    <button onclick="document.location='payment.php?id=<?php echo $room_schedule_id; ?>'">Next</button>
                </div>
            </div>
        </main>
    </div>
    </main>
    </div> <!-- .container -->
    </div>
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