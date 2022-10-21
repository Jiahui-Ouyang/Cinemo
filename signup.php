<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

  <title>Cinemo Sign-In</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  <!-- Loading main css file -->
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <div class="center1">
    <div class="page">
      <div class="page">
        <form action="register.php" method="post">
          <div class="imgcontainer">
            <img src="images/Cinemo Logo.JPG" alt="Avatar" class="avatar">
          </div>
          <?php
          if (isset($_SESSION["message"])) {
            echo "<div name='Session_message'>";
            echo "<div class='alert alert-primary' role='alert'>";
            echo $_SESSION["message"];
            echo "</div></div>";
            unset($_SESSION["message"]);
          } ?>
          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" required>

          <label for="name"><b>Surname</b></label>
          <input type="text" placeholder="Enter Surname" name="surname" required>

          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <div class="login">
            <button onclick="document.location='cinemohomepage.php'" name="SignUp">Sign Up</button>
            <div class="signin_link">
              <span>Have an account already?<a href="signin.php">Sign In</a></span>
            </div>

          </div> <!-- .movie-list -->

      </div>
    </div>

    </form>

</body>

</html>