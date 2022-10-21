<?php
require_once "db_connect.php";
session_start();

if (isset($_POST['SignUp'])) {
    $Name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['uname'];
    $role = 'customer';
    $password = md5($_POST['psw']);

    $sql = "INSERT INTO `users`( `name`, `surname`, `username`, `password`, `role`) VALUES ('$Name','$surname','$username','$password','customer');";
    $sql_run = mysqli_query($conn, $sql);
    if ($sql_run) {
        $_SESSION['message'] = "Sign up successfully!";
        header('location:signup.php');
    } else {
        echo "'error! Sign up action unsuccessful'";
        echo "error" . mysqli_error($conn);
    }
}
