<?php
require_once "db_connect.php";
session_start();
$sql = $conn->query("SELECT movies.title,theater_room.room_number,cinema.cinema_name,room_schedule.*,room_template.* FROM room_schedule JOIN room_template JOIN theater_room JOIN cinema JOIN movies WHERE room_schedule.theater_room_idd = room_template.theater_room_id AND room_schedule.theater_room_idd = theater_room.theater_room_id AND theater_room.cinema_id = cinema.cinema_id AND room_schedule.movie_idd = movies.movie_id;");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Test</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Loading main css file -->
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/test.scss">


</head>

<div class="col-md-10 ">
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Ticket Number Sales</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                578
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>10% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h4 class="card-title mb-0">Revenue</h4>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                ฿ 11.61k
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>2.5% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row"><?php
                        $num_total_tickets = "";
                        $total = "";
                        $num_cinema_sales = array();
                        $total_cinema_sales = array();
                        $result = [];
                        $res = [];
                        $result_theater_room = [];
                        $res_theater_room = [];
                        // $total_theater_room_sales = 0;
                        $total_room_schedule_sales = 0;
                        while ($row = $sql->fetch_assoc()) {
                            $seats_booked = $row['seats_booked'];
                            $seats_booked = array_filter(explode(',', $seats_booked));
                            $length_seats_booked = count($seats_booked);
                            $movie_name = $row['title'];
                            $showdate = $row['movie_showdate'];
                            $showtime = $row['movie_showtime'];
                            $first_seat_price = $row['f_seat_price'];
                            $second_seat_price = $row['s_seat_price'];
                            $cinema_name = $row['cinema_name'];
                            $MAX_first = $row['f_row_num'] * $row['f_column_num'];

                            $num_theater_room_tickets[] = array($row['theater_room_idd'] => $length_seats_booked);

                            $num_cinema_sales[] = array("$cinema_name" => $length_seats_booked);
                            // print_r($room_sales) . "<br/>";
                            for ($i = 0; $i < $length_seats_booked; $i++) {
                                // if (!empty($seats_booked[$i])) {
                                if (($seats_booked[$i]) < $MAX_first) {
                                    $total .= $first_seat_price . ",";
                                    $total_cinema_sales[] = array("$cinema_name" => $first_seat_price);
                                    $total_theater_room_sales[] = array($row['theater_room_idd'] => $first_seat_price);
                                    // echo "ROOM: " . $row['theater_room_id'] . "; FIRST SEATS: " . $seats_booked[$i] . "<br/>";
                                    $total_room_schedule_sales .= +$first_seat_price . ",";
                                } else {
                                    $total .= $second_seat_price . ",";
                                    $total_cinema_sales[] = array("$cinema_name" => $second_seat_price);
                                    $total_theater_room_sales[] = array($row['theater_room_idd'] => $second_seat_price);
                                    // echo "ROOM: " . $row['theater_room_id'] . "; SECOND SEATS: " . $seats_booked[$i] . "<br/>";
                                    $total_room_schedule_sales .= +$second_seat_price . ",";
                                }
                                // echo "ROOM: " . $row['theater_room_id'] . " in " . $cinema_name . "; FIRST SEATS SALES: " . $total_theater_room_sales . "<br/>";
                                // $num_theater_room_tickets .= $seats_booked[$i] . ",";
                                $num_total_tickets .= $seats_booked[$i] . ",";
                            }
                            // $length_seats_booked = array_filter($length_seats_booked);
                            echo "ROOM " . $row['room_number'] . " in " . $cinema_name . ";  " . $length_seats_booked . " SEATS has been saled. <br/>";
                            $total_room_schedule_sales = array_sum(array_filter(explode(',', $total_room_schedule_sales)));
                            // echo "ROOM " . $row['room_number'] . " in " . $cinema_name . "; Now showing: " . $movie_name . " at " . $showtime . " on " . $showdate . ".<br/> Total SEATS SALES in this room schedule: " . $total_room_schedule_sales . ";<br/>";
                            // Reset the result in case next room schedule in the whoole loop
                            $total_room_schedule_sales = 0;
                            // echo "ROOM " . $row['room_number'] . " in " . $cinema_name . "; Now showing ".$movie_name."; FIRST SEATS SALES: " . $total_theater_room_sales . "<br/>";
                        }
                        // print_r($num_theater_room_tickets);
                        // for ($i = 1; $i <= count($result), $k = $i-1; $i++) {
                        //     echo "Cinema id " . array_keys(($result)[$k]). " has " . array_values(($result)[$k]) . " Tickets Saled.<br/>";
                        // }

                        // Calculation for theater room:
                        foreach ($num_theater_room_tickets as $k => $subArray) {
                            foreach ($subArray as $id => $value) {
                                $result_theater_room[$id] += $value;
                            }
                        }
                        foreach ($result_theater_room as $key => $value) {
                            echo "Theaetr room id is " . $key . " has " . $value . " Tickets Saled.<br/>";
                        }

                        foreach ($total_theater_room_sales as $k => $subArray) {
                            foreach ($subArray as $id => $value) {
                                $res_theater_room[$id] += $value;
                            }
                        }
                        //print_r($res);
                        foreach ($res_theater_room as $key => $value) {
                            echo "Total sales of (theater room id " . $key . ") is " . $value . " Baht.<br/>";
                        }



                        // Calculation for Cinema:
                        foreach ($num_cinema_sales as $k => $subArray) {
                            foreach ($subArray as $id => $value) {
                                $result[$id] += $value;
                            }
                        }
                        foreach ($result as $key => $value) {
                            echo $key . " has " . $value . " Tickets Saled.<br/>";
                        }
                        // for ($i = 1; $i <= count($result), $k = $i-1; $i++) {
                        //     echo "Cinema id " . array_keys(($result)[$k]). " has " . array_values(($result)[$k]) . " Tickets Saled.<br/>";
                        // }

                        foreach ($total_cinema_sales as $k => $subArray) {
                            foreach ($subArray as $id => $value) {
                                $res[$id] += $value;
                            }
                        }
                        //print_r($res);
                        foreach ($res as $key => $value) {
                            echo "Total sales of " . $key . " is " . $value . " Baht.<br/>";
                        }
                        // for ($i = 1; $i <= count($res); $i++) {
                        //     echo "Cinema name " . array_keys($res)[$i - 1] . " Total Sales: " . $res[$i] . ".<br/>";
                        // }

                        // Calculation for total of the whole system:
                        $num_total_tickets = array_filter(explode(',', $num_total_tickets));
                        $num_total_tickets = count($num_total_tickets);
                        $total = array_sum(array_filter(explode(',', $total)));
                        echo "<br/>Total number of all tickets: " . $num_total_tickets . "<br/>";
                        echo "Total sales of all tickets: " . $total;
                        ?>

        <?php
        function getRandomWord($len = 22)
        {
            $word = array_merge(range('0', '9'));
            shuffle($word);
            return substr(implode($word), 0, $len);
        }

        ?>
        <br />
        <input type="text" name="vendorid" id="vendorID" readonly value="<?php echo getRandomWord(); ?>" class="form-control" maxlength="22">
    </div>
    <div class="card card--accent">
        <h2><svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-coffee" href="#icon-coffee" />
            </svg>Accent</h2>
        <label class="input">
            <input class="input__field" type="text" placeholder=" " />
            <span class="input__label">Some Fancy Label</span>
        </label>

        <div class="button-group">
            <button>Send</button>
            <button type="reset">Reset</button>
        </div>
    </div>
</div>
</div>

</div>
</div>