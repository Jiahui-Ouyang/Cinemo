<?php
require_once "../db_connect.php";

if (isset($_GET['cinema_id']) && isset($_POST['editForm'])) {
    $cinema_id = $_GET['cinema_id'];
    $cinema_name = $_POST['cinema_name'];
    $location = $_POST['location'];

    $updatesql = "UPDATE `cinema` SET 
                                `cinema_name`= '$cinema_name',
                                `location`= '$location'
                                WHERE cinema_id = '$id'";
    mysqli_query($conn, $updatesql);
    header('location:cinemamanagement.php');
    exit;
}
