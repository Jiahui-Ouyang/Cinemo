<?php
require_once "../db_connect.php";

if (isset($_GET['id']) && isset($_POST['editForm'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $duration_min = $_POST['duration_min']/60;
    $duration_min = substr($duration_min,1);
    $duration = $duration_hour.$duration_min;
    $release_date = $_POST['release_date'];

    if (isset($_FILES['cover_img']['name'])) {

        $img_name = $_FILES['cover_img']['name'];
        $tmp_name = $_FILES['cover_img']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);
        // Extensions list
        $allowed_exs = array('jpg', 'jpeg', 'png');

        if (in_array($img_ex_to_lc, $allowed_exs)) {
            $update_img_name =  $id . '.' . $img_ex_to_lc;
            $img_upload_path = '../images/' . $update_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // echo $update_img_name;
            // ADD to Database
            // A new cover img would be updated, if not, it will failure.
            // echo $update_img_name, "Tmp:", $update_img_tmpname;

            // Then update to database:
            $updatesql = "UPDATE `movies` SET 
                                `title`= '$title',
                                `Genre`= '$genre',
                                `cover_img` = '$update_img_name',
                                `description`= '$description',
                                `duration` = '$duration',
                                `release_date` = '$release_date'
                                WHERE movie_id = '$id'";
            mysqli_query($conn, $updatesql);
            header('location:moviemanagement.php');
            exit;
        }
    }
}
