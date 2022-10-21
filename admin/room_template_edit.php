<style>
    .textint {
        width: 60px;
    }
</style>
<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
// Ignore the error when page load at first
ini_set("display_errors", "off");
require "../db_connect.php";
$theater_room_id = $_GET['id'];
//echo $theater_room_id;
$room_template = $conn->query("SELECT * FROM room_template WHERE theater_room_id = $theater_room_id");

if ($room_template->num_rows != 1) {
    // redirect to show page
    header('location:theater_room_list.php');
    print_r($id);
    die('id is not in db');
}

$data = $room_template->fetch_assoc();
//print_r($data);

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
    <link rel="stylesheet" href="../css/seatingstyle.css">

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
                        <li class="menu-item"><a href="../sigout.php">Log Out</a></li>
                    </ul> <!-- .menu -->
                </div><!-- .main-navigation -->
        </header>

        <!-- .main-navigation -->

        <!-- Page content -->

        <!-- List of Movies Section -->
        <main class="main-content">
            <div class="container">
                <div class="page">
                    <div class="row">
                        <div class="w3-container w3-padding-32" id="latest movies">
                            <h1 class="w3-center">Theater Room Seat Configuration</h1>
                        </div>
                        <form id="form" action="" method="POST">
                            <tbody id="tbody">
                                <tr>
                                    <th>①Row Number: </th>
                                </tr>
                                <tr>
                                    <td><input type='number' name='f_seat_row' id='f_seat_row' min="1" max="20" class="textint" value="<?php echo $data['f_row_num']; ?>"></td>
                                </tr>
                                <tr>
                                    <th class="text-center">①Column Number: </th>
                                </tr>
                                <tr>
                                    <td><input type='number' name='f_seat_column' id='f_seat_column' min="1" max="30" class="textint" value="<?php echo $data['f_column_num']; ?>"></td>
                                </tr>
                                <br> </br>
                                <tr>
                                    <th class="text-center">①Seat Price: </th>
                                </tr>
                                <input type="number" id="PRICE" name="f_seat_price" class="textint" value="<?php echo $data['f_seat_price']; ?>">
                                <br> </br>
                            </tbody>
                            <tbody id="tbody">
                                <tr>
                                    <th class="text-center">②Row Number: </th>
                                </tr>
                                <tr>
                                    <td><input type='number' name='s_seat_row' id='s_seat_row' min="1" max="20" class="textint" value="<?php echo $data['s_row_num']; ?>"></td>
                                </tr>
                                <tr>
                                    <th class="text-center">②Column Number: </th>
                                </tr>
                                <tr>
                                    <td><input type='number' name='s_seat_column' id='s_seat_column' min="1" max="30" class="textint" value="<?php echo $data['s_column_num']; ?>"></td>
                                </tr>
                                <br> </br>
                                <tr>
                                    <th class="text-center">②Seat price: </th>
                                </tr>
                                <tr>
                                    <input type="number" id="PRICE" name="s_seat_price" class="textint" value="<?php echo $data['s_seat_price']; ?>">
                                </tr>
                                <br></br>
                                <tr>
                                    <input type="submit" id="layout" name="layout" value="Get layout">
                                </tr>

                            </tbody>


                            <div class="movie-screen">
                                <img src='../images/screen.JPG' alt='screen' />
                            </div>
                            <!-- Here can load the first rows number and first column numbers from user inputs -->
                            <?php
                            $row_number = $_POST['f_seat_row'];
                            for ($r = 0; $r < $row_number; $r++) {
                            ?>
                                <div class="row justify-content-center">
                                    <?php
                                    $column_number = $_POST['f_seat_column'];
                                    for ($c = 0; $c < $column_number; $c++) {
                                    ?>
                                        <div class="seat"></div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            <?php
                            }
                            ?>

                            <!-- Here can load the second rows number and second column numbers from user inputs -->
                            <?php
                            $row_number = $_POST['s_seat_row'];
                            for ($r = 0; $r < $row_number; $r++) {
                            ?>
                                <div class="row justify-content-center">
                                    <?php
                                    $column_number = $_POST['s_seat_column'];
                                    for ($c = 0; $c < $column_number; $c++) {
                                    ?>
                                        <div class="seat"></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                    </div>
                    <br></br>
                    <div class="w3-center">
                        <button formaction="room_template_modify.php?id=<?= $theater_room_id; ?>" name="TICKET_PRICE" id="TICKET_PRICE" type="submit">Confirm</button>
                    </div>
                    </form>
</body>
</div>

</div> <!-- .container -->
</div>
<!-- Default snippet for navigation -->

<footer class="site-footer">
    <div class="row">
        <div class="col-md-2">
            <div class="widget">
                <h3 class="widget-title">About Us</h3>
                <p>Cinemo is a web application which used by a particular movie theater business.</p>
            </div>
        </div>
    </div>
    <div class="colophon">Copyright 2022 Cinemo</div>
    </div> <!-- .container -->

</footer>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>