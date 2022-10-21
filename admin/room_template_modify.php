<?php
session_start();
require_once "../db_connect.php";
$theater_room_id = $_GET['id'];
if (isset($_POST["TICKET_PRICE"])) {
    // When the confirm button is clicked, the rows number, columns numbers and ticket price will be updated
    $first_row_number = $_POST['f_seat_row'];
    $second_row_number = $_POST['s_seat_row'];
    $first_column_number = $_POST['f_seat_column'];
    $secondcolumn_number = $_POST['s_seat_column'];
    $first_ticketprice = $_POST['f_seat_price'];
    $second_ticketprice = $_POST['s_seat_price'];
    //echo $ticketprice;
    $updatesql = "UPDATE `room_template` SET `theater_room_id`='$theater_room_id',`f_row_num`='$first_row_number',`f_column_num`='$first_column_number',`f_seat_price`='$first_ticketprice',`s_row_num`='$second_row_number',`s_column_num`='$secondcolumn_number',`s_seat_price`='$second_ticketprice' WHERE `theater_room_id` = '$theater_room_id'";
    mysqli_query($conn, $updatesql);
    $_SESSION['status'] = "Theater room and room template information has been edited!";
    header('location:theater_room_list.php');
    exit;
}
else {
    echo "error";
}
