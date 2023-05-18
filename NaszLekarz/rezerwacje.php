<!DOCTYPE html>
<html>
  <head>
    <title>Strona Główna</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <header>
      <h1>Nasz Lekarz</h1>
    </header>
    <nav>
      <ul>
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="rezerwacje.php">Rezerwacja wizyty</a></li>
        <li><a href="#">Opinie</a></li>
        <li><a href="#">Kontakt</a></li>
        <li><a href='user.php'>Użytkownik</a></li>
        <li><a href="wyloguj.php">Wyloguj</a></li>
      </ul>
    </nav>
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

    }
    ?>
    <main>
      <h1>Rezerwacje</h1>

      <?php
      include 'connect.php';

      echo'<br><br><br>';


      echo'<form name="specjalizacje" method="post">';

      echo'<select name="specjalizacje">';
      echo'<option value="alergologia">Alergologia</option>';
      echo'<option value="kardiologia">Kardiologia</option>';
      echo'<option value="neurologia">Neurologia</option>';
      echo'<option value="okulistyka">Okulistyka</option>';
      echo'<option value="pediatria">Pediatria</option>';
      echo'</select>';

      echo'<button name="wyslij" type="submit">Wybierz</button>';
      echo'</form>';

      echo'<br><br>';

      if(isset($_POST['wyslij'])){

      $typ = $_POST['specjalizacje'];



    	$query = mysqli_query($con, "SELECT * FROM $typ");
        if (mysqli_num_rows($query) > 0) {

    	echo'<table>';
    	echo"<tr>";
    		echo"<th>Imie</th>";
    		echo"<th>Nazwisko</th>";
    		echo"<th>Data</th>";
    		echo"<th>Godzina</th>";
    		echo"<th>Numer gabinetu</th>";
    	echo"</tr>";

    	while($row = mysqli_fetch_assoc($query)) {
    		echo "<tr>";
    		echo "<td>" .  $row["Imie"] . "</td>";
    		echo "<td>" .  $row["Nazwisko"] . "</td>";
    		echo "<td>" .  $row["data"] . "</td>";
    		echo "<td>" .  $row["godzina"] . "</td>";
    		echo "<td>" .  $row["nr_gabinetu"] . "</td>";
        echo '<td id="button"> <button class="button" name="Zarezerwuj" type="submit">Zarezerwuj</button> </td>';
    		echo "</tr>";
    	}
    	echo"</table>";
    	}
    	 }

      ?>
      <br>
      <h1>Moje Rezerwacje</h1>
      <?php


      echo'<br>';


    	$query = mysqli_query($con, "SELECT * FROM rezerwacje WHERE login=\"$user\"");
        if (mysqli_num_rows($query) > 0) {

    	echo'<table>';
    	echo"<tr>";
    		echo"<th>Imie</th>";
    		echo"<th>Nazwisko</th>";
    		echo"<th>Data</th>";
    		echo"<th>Godzina</th>";
    		echo"<th>Numer gabinetu</th>";
    	echo"</tr>";

    	while($row = mysqli_fetch_assoc($query)) {
    		echo "<tr>";
    		echo "<td>" .  $row["imie"] . "</td>";
    		echo "<td>" .  $row["nazwisko"] . "</td>";
    		echo "<td>" .  $row["data"] . "</td>";
    		echo "<td>" .  $row["godzina"] . "</td>";
    		echo "<td>" .  $row["nr_gabinetu"] . "</td>";
    		echo "</tr>";
    	}
    	echo"</table>";
    	}


      ?>
      <script>
        document.getElementById("specialization").addEventListener("change", function () {
          var selectedValue = this.value;
          var rows = document.getElementById("opinions-table").getElementsByTagName("tr");

          for (var i = 1; i < rows.length; i++) {
            var specialization = rows[i].getAttribute("data-specialization");
            if (selectedValue === "" || specialization === selectedValue) {
              rows[i].style.display = "";
            } else {
              rows[i].style.display = "none";
            }
          }
        });
      </script>
    </main>
  </body>
</html>
