<?php
session_start();
if (!isset($_SESSION['userid']) || $_SESSION['userRole'] !== 'staff') {
	// echo "USER ID IS:  ".$_SESSION['userid'];
	// echo "<br>"."USER ROLE IS".$_SESSION['userRole'];
	$_SESSION['errors'] = "Please login with username and password.";
	// require_once "../signout.php";
	unset ($_SESSION['userid']);
	unset ($_SESSION['userRole']);
	header('location:../signin.php');
}
