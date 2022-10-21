<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require_once "../db_connect.php";

$del_id = $_GET['id'];

if (strlen($del_id)>0){
	$query = mysqli_query($conn, "DELETE FROM theater_room WHERE theater_room_id = $del_id");

    if($query)
    {
        $_SESSION['status'] = "Theater room data has been deleted! Please reslect the cinema.";
        header('location:theater_room_list.php');
    }
    else{
        echo "'error! Delete opertation unsuccessful'";
	    echo "error".mysqli_error($conn);

    }
	
}
