<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";

require_once "../db_connect.php";

$id = $_GET['id'];
$movie = $conn->query("SELECT * FROM movies WHERE movie_id = $id");
if ($movie->num_rows != 1) {
    // redirect to show page
    header('location:moviemanagement.php');
    print_r($id);
    die('id is not in db');
}
$data = $movie->fetch_assoc();
$duration_min = explode('.', $data['duration'])[1];
$k = 0;
$duration_min = floor(($k . '.' . $duration_min) * 60);
// print_r($data);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Cinemo Movie Management</title>
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
            <div class="page justify-content-center">
                <div class="row">
                    <div class="title">
                        <h1 class="w3-center">Edit Form</h1>
                    </div>
                </div>
                <form action="movie_modify.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group" style="text-align: center; ">
                        <label for="title" class="col-1 col-form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= $data['title'] ?>">
                    </div>
                    <div class="form-group" style="text-align: center; ">
                        <label for="genre" class="col-1 col-form-label">Genre</label>
                        <input type="text" style="padding-left:15px" class="form-control" name="genre" id="genre" value="<?= $data['Genre'] ?>">
                    </div>
                    <div class="form-group-row" style=" text-align: center;  padding:center">
                        <label for="cover_img" class="col-form-label">Cover_img</label>
                    </div>
                    <div class="form-group-row" style=" text-align: center;  padding:center">
                        <img src="../images/<?php echo $data['cover_img'] ?>" alt="" width="200" height="200" margin: auto>
                    </div>
                    <br>
                    <div class="form-group-row" style=" text-align: center;  padding-left:80px">
                        <input type="file" class="form-control-file" name="cover_img" id="cover_img" value="<?= $data['cover_img'] ?>">
                        <tr>
                            <br></br>
                    </div>
                    <div class="form-group" style="text-align: center;  padding-right:80px">
                        <label for="description" class="col-1 col-form-label">Description</label>
                        <textarea class="form-group-row" name="description" id="description" cols="30" rows="10"><?= $data['description'] ?></textarea>
                    </div>
                    <div class="form-group" style="text-align: center; padding-right:80px ">
                        <label for="description" class="col-1 col-form-label">Duration</label>
                        <input type='number' name='duration_hour' max="12" min="0" value="<?php echo floor($data['duration']) ?>"> h:
                        <input type='number' name='duration_min' max="59" min="0" value="<?php if ($duration_min != 0) {
                                                                                                echo $duration_min;
                                                                                            } else {
                                                                                                echo 0;
                                                                                            } ?>"> min
                    </div>
                    <div class="form-group" style="text-align: center;  padding-right:80px">
                        <label for="release_date" class="col-1 col-form-label">Release Date</label>
                        <input type="date" name="release_date" id="release_date" value="<?= $data['release_date'] ?>">
                    </div>
                    <div class="w3-center">
                        <button type="submit" name="editForm" value="Submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>

            </div>
        </div><!-- .container -->
    </main>


</body>

</html>