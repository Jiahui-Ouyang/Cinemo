<?php
session_start();
// if (!$_SESSION['userid']) {
// 	header('location:../signin.php');
// }
include "auth.php";
require_once "../db_connect.php";


$del_id = $_GET['id'];
if (strlen($del_id)>0){
	$query = mysqli_query($conn, "DELETE FROM movies WHERE movie_id = $del_id");
	if($query)
    {
        $_SESSION['status'] = "Movie data has been deleted!";
        header('location:moviemanagement.php');
    }
    else{
        echo "'error! Delete opertation unsuccessful'";
	    echo "error".mysqli_error($conn);

    }
}
?>