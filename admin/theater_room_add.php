<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require_once "../db_connect.php";
$sql = "SELECT DISTINCT cinema.cinema_name,cinema.cinema_id FROM cinema JOIN theater_room";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<style>
    table.center {
        margin-left: auto;
        margin-right: auto;
    }
</style>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Cinemo Theater Owner Homepage</title>

    <!-- Loading third party fonts -->


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

    </div>


    <!-- Page content -->

    <!-- List of Movies Section -->
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="row">

                    <h1 class="w3-center">New theater room infomation</h1>
                    <form method="POST" action="theater_room_add.php">
                        <div class="w3-center">
                            <table>
                                <div class="w3-center">
                                    <h2>Cinema</h2>
                                    <select id="get_cinema_name" name="get_cinema_name">
                                        <option value=""> -- Please select cinema --</option>
                                        <?php
                                        while ($rows = mysqli_fetch_array($result)) {
                                        ?>
                                            <option id="<?php echo $rows['cinema_id']; ?>"> <?php echo $rows['cinema_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <br></br>
                                </div>
                                <tr>
                                    <th class="text-center">New Theater Room Number</th>
                                    <th class="text-center">Theater Type</th>
                                </tr>
                                <tr>
                                    <td><input type='text' name='room_number'></td>
                                    <td><input type='text' name='room_type'></td>
                                </tr>
                            </table>
                            <div class="w3-center">
                                <button type="submit" name="submit" value="">Add</button>
                            </div>
                    </form>

                    <?php
                    //Php to get the cinema name from the selected option
                    if (isset($_POST['get_cinema_name'])) {
                        $cinema_name = $_POST['get_cinema_name'];
                        //Get cinema id accroding to cinema name in table 'cinema'
                        $searchsql = "SELECT * from cinema WHERE cinema_name = '$cinema_name'";
                        $res = mysqli_query($conn, $searchsql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($r = mysqli_fetch_array($res)) {
                                $cinema_id = $r["cinema_id"];
                                // echo $cinema_id;

                                // Then get the input data in textbox and insert them into table 'theater_room'
                                if (isset($_POST["submit"])) {
                                    $roomnum = $_POST['room_number'];
                                    $roomtype = $_POST['room_type'];
                                    $theater_room_id = 0;
                                    $addsql = "INSERT INTO theater_room (theater_room_id, cinema_id,room_number,room_type) 
                                    VALUES ('$theater_room_id','$cinema_id', '$roomnum', '$roomtype')";
                                    $query_run = mysqli_query($conn, $addsql);
                                    $theater_room_id = mysqli_insert_id($conn);
                                    if ($query_run) {
                                        $_SESSION['status'] = "New theater room infromation has been added!";
                                        header("location:room_template_add.php?id= $theater_room_id");
                                    } else {
                                        echo "'error! Add opertation unsuccessful'";
                                        echo "error" . mysqli_error($conn);
                                    }
                                }
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>