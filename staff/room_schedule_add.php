<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require_once "../db_connect.php";
// Reference from theater room id!
$theater_room_id = $_GET['id'];

$movie = "SELECT movies.movie_id,movies.title FROM movies";
$result = mysqli_query($conn, $movie);
// Get the movie id accroding the movie name
if (isset($_POST['get_movie_name'])) {
    $moviename = $_POST['get_movie_name'];
    $movieid = "SELECT movies.movie_id,movies.title FROM movies WHERE movies.title='$moviename'";
    $r = mysqli_query($conn, $movieid);
    if (mysqli_num_rows($r) > 0) {
        while ($re = mysqli_fetch_array($r)) {
            $movie_id = $re['movie_id'];
            // Now have the movie_id for insert query
            if (isset($_POST["submit"])) {
                $showdate = $_POST['sdate'];
                $showtime = $_POST['stime'];
                $room_schedule_id = 0;
                // echo $theater_room_id;

                $addsql = "INSERT INTO room_schedule (room_schedule_id, theater_room_idd,movie_idd, movie_showdate, movie_showtime) 
                        VALUES ('$room_schedule_id','$theater_room_id', '$movie_id','$showdate','$showtime' )";
                $query_run = mysqli_query($conn, $addsql);
                $room_schedule_id = mysqli_insert_id($conn);
                if ($query_run) {
                    $_SESSION['status'] = "New movie schedule has been added!";
                    header("location:room_schedule_list.php?id=$theater_room_id");
                } else {
                    echo "'error! Add opertation unsuccessful'";
                    echo "error" . mysqli_error($conn);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Cinemo Theater Owner Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Loading main css file -->
    <link rel="stylesheet" href="../css/style.css">

</head>


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



<!-- List of Movies Section -->
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <form method="POST" action="">
                    <table>
                        <div class="title">
                            <h2 class="w3-center">New movie schedule<h2>
                        </div>
                        <tr>
                            <th class="text-center">Movie name</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                        </tr>
                        <tbody id="tbody">
                            <tr>
                                <td><select id="get_movie_name" name="get_movie_name">
                                        <option value=""> -- Please select movie --</option>
                                        <?php
                                        while ($rows = mysqli_fetch_array($result)) {
                                        ?>
                                            <option id="<?php echo $rows['movie_id']; ?>"> <?php echo $rows['title']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></td>
                                <td><input type='date' name='sdate'></td>
                                <td><input type='time' name='stime'></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="w3-center">
                        <button type="submit" name="submit" value="">Add </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

</html>