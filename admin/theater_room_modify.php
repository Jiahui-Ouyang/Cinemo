<?php
require_once "../db_connect.php";

if (isset($_GET['id']) && isset($_POST['editForm'])) {
    $id = $_GET['id'];
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];

    $updatesql = "UPDATE `theater_room` SET 
                                `room_number`= '$room_number',
                                `room_type`= '$room_type'
                                WHERE theater_room_id = '$id'";
    mysqli_query($conn, $updatesql);
    // Go to edit room template page
    header("location:room_template_edit.php?id= $id");
    exit;
}
