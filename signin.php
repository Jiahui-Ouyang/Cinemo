<?php
require_once "db_connect.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

  <title>Cinemo Sign-In</title>

  <!-- Bootstrap 5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">

</head>

<body>
  <div class="center1">
    <div class="page">

      <div class="imgcontainer">
        <img src="images/Cinemo Logo.JPG" alt="Avatar" class="avatar">
      </div>
      <?php
      if (isset($_SESSION["errors"])) {
        echo "<div name='Session_message'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo $_SESSION["errors"];
        echo "</div></div>";
        unset($_SESSION["errors"]);
      } ?>
    </div>
    <form action="checksignin.php" method="POST">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <div class="login">
        <button type="submit" name="customerLogin">Sign In</button>
        <br></br>
        <button type="submit" name="adminLogin">Sign In as Admin</button>
        <button type="submit" name="staffLogin">Sign In as Staff</button>
      </div>
    </form>
    <div class="signin_link">
      <span>Don't have an account ?<a href="signup.php">Sign Up</a></span>
    </div>
  </div>


  </div>
  </div>



</body>

</html>