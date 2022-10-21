<?php
session_start();
if (!$_SESSION['userid']) {
	header('location:../signin.php');
}
require "../db_connect.php";

$user_id = $_SESSION['userid'];
$book_history_id = $_GET['id'];
if (isset($_POST['givereviews'])) {
	// echo $_POST['rating'];
	$rating_stars = $_POST['rating'];
	$review_text = $_POST['Review'];

	$sql = "INSERT INTO `review`( `book_history_idd`, `user_idd`, `review_stars`, `review_text`) 
	VALUES ('$book_history_id','$user_id','$rating_stars','$review_text');";
	$query_run = mysqli_query($conn, $sql);
	if($query_run){
		$_SESSION['messages']='Thanks for your reviews!';
		header("location:historypage.php");
	}
}
?>