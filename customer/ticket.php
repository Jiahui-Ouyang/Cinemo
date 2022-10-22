<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Digital Movie Ticket</title>
    <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="../css/ticket.css">

</head>

<body>

    <div class="ticket">
        <div class="holes-top"></div>
        <div class="title">
            <p class="cinema">ODEON CINEMA PRESENTS</p>
            <p class="movie-title">ONLY GOD FORGIVES</p>
        </div>
        <div class="poster">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/25240/only-god-forgives.jpg" alt="Movie: Only God Forgives" />
        </div>
        <div class="info">
            <table>
                <tr>
                    <th>Theater </th>
                    <th>ROW</th>
                    <th>SEAT</th>
                </tr>
                <tr>
                    <td class="bigger">18</td>
                    <td class="bigger">H</td>
                    <td class="bigger">24</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>PRICE</th>
                    <th>DATE</th>
                    <th>TIME</th>
                </tr>
                <tr>
                    <td>$12.00</td>
                    <td>1/13/17</td>
                    <td>19:30</td>
                </tr>
            </table>
        </div>
        <div class="holes-lower"></div>
        <div class="serial">
            <table class="barcode">
                <tr></tr>
            </table>
            <table class="numbers">
                <tr>
                    <td>9</td>
                    <td>1</td>
                    <td>7</td>
                    <td>3</td>
                    <td>7</td>
                    <td>5</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td>5</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>7</td>
                    <td>8</td>
                    <td>7</td>
                    <td>3</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>5</td>
                    <td>2</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="../js/ticket.js"></script>

</body>

</html>