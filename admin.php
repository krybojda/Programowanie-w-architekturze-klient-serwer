<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <script src="cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Strona Główna</title>
  <body>
    <div class="sidenav">
      <a href="index.php"><img src="logo1.png"></a>
      <h3>Admin</h3>
      <a href="admin.php?typ=kardiologia">Termin Kardiologia</a>
      <a href="admin.php?typ=neurologia">Termin Neurologia</a>
      <a href="admin.php?typ=okulistyka">Termin Okulistyka</a>
      <a href="admin.php?typ=pediatria">Termin Pediatria</a>
      <a href="admin.php?typ=alergologia">Termin Alergologia</a>
      <a href="admin.php?typ=zamowieniauserow">Terminy pacjentów</a>
      <h3>User</h3>
      <a href="index.php?typ=kardiologia">Kardiologia</a>
      <a href="index.php?typ=neurologia">Neurologia</a>
      <a href="index.php?typ=okulistyka">Okulistyka</a>
      <a href="index.php?typ=pediatria">Pediatria</a>
      <a href="index.php?typ=alergologia">Alergologia</a>
      <a href="zamowienia.php">Zamówienia</a>
      <a href="koszyk.php">Koszyk</a>
      <?php
      session_start();
        if(isSet($_SESSION["login"])&&$_SESSION["typkonta"]==1){
          $user = $_SESSION["login"];
        }
        else{
          echo '<script type="text/javascript">
                window.location = "login.html";
                </script>';
        }
        if(isSet($_SESSION["login"])){
          $con = mysqli_connect("localhost","root","","naszlekarz");
          $query = mysqli_query($con,"SELECT * FROM user WHERE login=\"$user\"");
          if (mysqli_num_rows($query) > 0) {
              while($row = mysqli_fetch_assoc($query)) {
                if($row["typ"]!=1){
                  echo '<script type="text/javascript">
                window.location = "index.php";
                </script>';
                }
              }
            }
            echo "<a href='user.php'>Użytkownik</a>";
        }
      ?>
      <a href="wyloguj.php">Wyloguj</a>
    </div>
    <div class="main">
        <?php
          if(isSet($_SESSION["login"])&&isSet($_GET["typ"])){
            $typ = $_GET["typ"];
            echo '<h1 style="text-align: center">' . ucwords($typ) . "</h1>";
            $con = mysqli_connect("localhost","root","","naszlekarz");
            if($typ!="zamowieniauserow"){
              echo "<form action='dodaj.php?typ=".$typ."' method='post'>
              <table>
                <tr><td>Nazwa:</td><td><input type='text' name='nazwa'></td></tr>
                <tr><td>Producent:</td><td><input type='text' name='producent'></td></tr>
                <tr><td>Rok wydania:</td><td><input type='number' name='vmax'></td></tr>
                <tr><td>Ilosc:</td><td><input type='number' step='1' name='ilosc'></td></tr>
                <tr><td>Cena:</td><td><input type='number' step='step=0.01' name='cena'></td></tr>
              <table>
                <input type='submit'>
              </form>";
            }
            else if($typ=="zamowieniauserow"){
              $con = mysqli_connect("localhost","root","","naszlekarz");
              $sql = "SELECT * FROM user";
              $query = mysqli_query($con,$sql);
              if (mysqli_num_rows($query) > 0) {
                echo '<table class="jq-toggle-table table table-condensed table-striped">';
                echo "<tr><th>ID Użytkownika</th><th>Login</th><th>Email</th><th>Typ konta</th><th>Zamówienia</th></tr>";
                  while($row = mysqli_fetch_assoc($query)) {
                          echo "<tr>";
                          echo "<td class='text-center'>" .  $row["id"] . "</td>";
                          echo "<td class='text-center'>" .  $row["login"] . "</td>";
                          echo "<td class='text-center'>" .  $row["email"] . "</td>";
                          if($row["typ"]==1){
                            echo "<td class='text-center'>Admin</td>";
                          }
                          else{
                            echo "<td class='text-center'>Użytkownik</td>";
                          }
                          echo "<td class='text-center'><button onclick='url(" . $row["id"] . ")'>Zamówienia</button></td>";
                          echo "</td>";
                  }
                  echo "</table>";
                }
            }
          }
          else{
            echo "<h3>Strona admina naszlekarz<br></h3>";
          }
         ?>
         <script>
             function url(id){
              var url = "zamowieniauzytkownika.php?id=" + id;
              window.location = url;
           }
        </script>
    </div>
  </body>
</html>
