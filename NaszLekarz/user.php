<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Dane użytkownika</title>
  <body>
    <?php
      session_start();
      $user=$_SESSION["login"];
	  include 'connect.php';
      if($con === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      mysqli_query($con,'SET NAMES \'utf8\'');
      $query = mysqli_query($con,"select * FROM user WHERE login='$user'");
      $i = 0;
      if (mysqli_num_rows($query) > 0) {
          while($row = mysqli_fetch_assoc($query)) {
              $email = $row["email"];
          }
        }
      echo '<div id="login">';
      echo '<h3 class="text-center text-grey pt-5">Dane użytkownika</h3><br><br>';
      echo '<div class="container">';
      echo '<div id="login-row" class="row justify-content-center align-items-center">';
      echo '<div id="login-column" class="col-md-6">';
      echo '<div id="login-box" class="col-md-12">';
      echo '<form id="login-form" class="form" action="userupdate.php" method="post">';
      echo '<h4 class="text-center">Login</h4>';
      echo '<div class="form-group">';
      echo 'Login:<br>';
      echo '<input type="text" name="username" id="username" class="form-control" disabled value="' . $user . '">';
      echo '</div>';
      echo '<div class="form-group">';
      echo 'Hasło:<br>';
      echo '<input type="password" name="password" id="password" class="form-control">';
      echo '</div>';
      echo '<div class="form-group">';
      echo 'Email:<br>';
      echo '<input type="email" name="email" id="email" class="form-control" value="' . $email . '">';
      echo '</div>';
      echo '<center><div id="button">';
      echo '<input type="submit" name="submit" class="button"  value="Zaaktualizuj dane">';
      echo '</div></center>';
      echo '</form>';
	  echo '<br><div id="button">';
      echo '<h4><a class="button" href="index.php">Powrót</a></h4>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
     ?>
  </div>
  </body>
</html>
