<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <script src="cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Rezerwacje</title>
  </head>
  <body>
    <div class="sidenav">
      <a href="index.php"><img src="logo.png"></a>
      <a href="index.php?typ=Kardiologia">Kardiologia</a>
      <a href="index.php?typ=Neurologia">Neurologia</a>
      <a href="index.php?typ=Okulistyka">Okulistyka</a>
      <a href="index.php?typ=Pediatria">Pediatria</a>
      <a href="index.php?typ=Alergologia">Alergologia</a>
      <a href="Rezerwacje.php">Rezerwacje</a>
      <a href="koszyk.php">Koszyk</a>
      <?php
      session_start();
        if(isSet($_SESSION["login"])){
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
              if($row["typ"]==1){
                echo "<a href='admin.php'>Admin</a>";
                $_SESSION["typkonta"] = "1";
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
        if(isSet($_GET["id"])){
            $con = mysqli_connect("localhost","root","","naszlekarz");
            $idusera = $_GET["id"];
            $sql = "SELECT * FROM Rezerwacje WHERE iduser = $idusera";
            $query = mysqli_query($con,$sql);
        }
        if (mysqli_num_rows($query) > 0){
            echo '<table class="jq-toggle-table table table-condensed table-striped">';
            echo "<tr><th>ID Rezerwacje</th><th>Typ</th><th>Nazwa</th><th>Cena</th><th>Suma</th></tr>";
            while($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td class='text-center'>" .  $row["id_Rezerwacje"] . "</td>";
                echo "<td class='text-center'>" .  $row["tabela"] . "</td>";
                echo "<td class='text-center'>" .  $row["nazwa"] . "</td>";
                echo "<td class='text-center'>" .  $row["cena"] . "</td>";
                echo "<td class='text-center'>" .  $row["suma"] . "</td>";
                echo "</td>";
            }
            echo "</table>";
        }
        else{
            echo "Brak zamówień";
        }
        ?>
         <script>
             function url(idzamow){
              var url = "zwrot.php?idzamow=" + idzamow;
              window.location = url;
           }
        </script>
    </div>
  </body>
</html>
