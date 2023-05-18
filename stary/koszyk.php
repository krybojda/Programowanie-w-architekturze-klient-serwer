<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <script src="cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Strona Główna</title>
    <script type="text/javascript">
      function url(id, tab){
        var idrow = "idrow" + id;
        var tygodnie = document.getElementById(idrow).value;
        var url = "dodajdokoszyka.php?tab=" + tab + "&id=" + id + "&tygodnie=" + tygodnie;
        console.log(url);
        window.location = url;
      }
    </script>
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
          if(isSet($_SESSION["koszyk"])){
            $suma = 0;
            echo '<table class="table table-condensed table-striped">';
            echo "<tr><th>nazwa</th><th>producent</th><th>Rok wydania</th><th>ilosc</th><th>Suma</th></tr>";
              for($i=0;$i<count($_SESSION["koszyk"]);$i++){
                $id = $_SESSION["koszyk"][$i]['id'];
                echo "<tr>";
                $tabela = $_SESSION['koszyk'][$i]['tab'];
                $con = mysqli_connect('localhost','root','','naszlekarz') or die (mysqli_error());
                $query = mysqli_query($con,"select * from $tabela where id = '$id'");
                  while($row = mysqli_fetch_assoc($query)) {
                    echo "<td class='text-center'>" .  $row["nazwa"] . "</td>";
                    echo "<td class='text-center'>" .  $row["producent"] . "</td>";
                    echo "<td class='text-center'>" .  $row["rok_wydania"] . "</td>";
                    echo "<td class='text-center'>" .  $_SESSION["koszyk"][$i]["ilosc"] . "</td>";
                    echo "<td class='text-center'>" .  $_SESSION["koszyk"][$i]["cena"] * $_SESSION["koszyk"][$i]["ilosc"] . " zł</td>";
                  }
                }
                echo "</table>";
                echo "<a href='zamow.php'><h2>Zamów teraz!</h2></a>";
                echo "<button onclick='window.location=\"oproznijkoszyk.php\"'>Wyczyść koszyk</button>";
              }
          else{
            echo '<h1>Koszyk pusty</h1>';
          }
         ?>
    </div>
  </body>
</html>
