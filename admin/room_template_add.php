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

?>
<style>
    .textint {
        width: 80px;
    }
</style>


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
                        <div class="w3-container w3-padding-32" id="latest movies">
                            <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">New Theater Room Seat Configuration</h1>
                        </div>
                        <form id="form" action="" method="POST">
                            <tbody id="tbody">
                                <tr>
                                    <th class="text-center">①Row Number: </th>
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
                                <input type="number" id="PRICE" name="PRICE" class="textint" value="<?php echo $data['f_seat_price']; ?>">
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
                                    <input type="number" id="PRICE" name="PRICE" class="textint" value="<?php echo $data['s_seat_price']; ?>">
                                </tr>
                                <br></br>
                                <tr>
                                    <input type="submit" id="layout" name="layout" value="Get layout">
                                </tr>

                            </tbody>
                        </form>

                        <div class="screen"></div>
                        <!-- Here can load the first rows number and first column numbers from user inputs -->
                        <?php
                        $row_number = $_POST['f_seat_row'];
                        for ($r = 0; $r < $row_number; $r++) {
                        ?>
                            <div class="row">
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
                            <div class="row">
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
                    <button name="TICKET_PRICE" id="TICKET_PRICE" type="submit">Confirm</button>
                </div>

            </div> <!-- .container -->
    </div>
    <!-- Default snippet for navigation -->



    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/app.js"></script>

    <?php
    if (isset($_POST["TICKET_PRICE"])) {
        // When the confirm button is clicked, the rows number, columns numbers and ticket price will be inserted into database
        $f_row_number = $_POST['f_seat_row'];
        $f_column_number = $_POST['f_seat_column'];
        $ticketprice = $_POST['PRICE'];
        $room_template_id = 0;

        $addsql = "INSERT INTO room_template (`room_template_id`, `theater_room_id`,`row_num`,`column_num`,`seat_price`) 
  VALUES ('$room_template_id','$theater_room_id', '$row_number', '$column_number','$ticketprice')";
        $query_run = mysqli_query($conn, $addsql);
        $room_template_id = mysqli_insert_id($conn);
        if ($query_run) {
            $_SESSION['status'] = "New theater room and room template information has been added!";
            header("location:theater_room_list.php");
        } else {
            echo "'error! Add opertation unsuccessful'";
            echo "error" . mysqli_error($conn);
        }
    }

    ?>
</body>

</html>