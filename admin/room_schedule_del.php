<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require_once "../db_connect.php";

$del_id = $_GET['id'];

if (strlen($del_id) > 0) {
    $g = mysqli_query($conn, "SELECT theater_room.theater_room_id, room_schedule.room_schedule_id,room_schedule.theater_room_idd FROM room_schedule JOIN theater_room WHERE room_schedule.room_schedule_id = 1 AND theater_room.theater_room_id = room_schedule.theater_room_idd");
    while ($r = mysqli_fetch_array($g)) {
        $room_id = $r['theater_room_id'];
        $query = mysqli_query($conn, "DELETE FROM room_schedule WHERE room_schedule_id = $del_id");
        if ($query) {
            $_SESSION['status'] = "Movie schedule data has been deleted!";
            header("location:room_schedule_list.php?id=$room_id");
            exit;
        } else {
            echo "'error! Delete opertation unsuccessful'";
            echo "error" . mysqli_error($conn);
            exit;
        }
    }
}
