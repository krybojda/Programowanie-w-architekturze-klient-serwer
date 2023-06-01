<!DOCTYPE html>
<html>
  <head>
    <title>Nasi lekarze</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript">
           function url(idrow, imie, nazwisko, specjalizacja){
              window.location = "opinie2.php?id=" + idrow + "&imie=" + imie + "&nazwisko=" + nazwisko + "&specjalizacja=" + specjalizacja ;
           }
         </script>
  </head>

  <body>
    <header>
      <h1>Nasz Lekarz</h1>
    </header>
    <nav>
      <ul>
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="rezerwacje.php">Rezerwacja wizyty</a></li>
        <li><a href="NasiLekarze.php">Nasi Lekarze</a></li>
        <li><a href="opinie.php">Opinie</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
        <li><a href='user.php'>Użytkownik</a></li>
        <li><a href="wyloguj.php">Wyloguj</a></li>
      </ul>
    </nav>
    <?php
    session_start();
	include 'connect.php';
      if(isSet($_SESSION["login"])){
        $user = $_SESSION["login"];
      }
      else{
        echo '<script type="text/javascript">
              window.location = "login.html";
              </script>';
      }
    if(isSet($_SESSION["login"])){
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
      <h1>Nasz zespół  </h1>

      <?php
      include 'connect.php';

      echo'<br><br><br>';


    	$query = mysqli_query($con, "SELECT * FROM lekarze");
        if (mysqli_num_rows($query) > 0) {

    	echo'<table>';
    	echo"<tr>";
    		echo"<th>Imie</th>";
    		echo"<th>Nazwisko</th>";
        echo"<th>Specjalizacja</th>";
    	echo"</tr>";

    	while($row = mysqli_fetch_assoc($query)) {
    		echo "<tr>";
    		echo "<td>" .  $row["imie"] . "</td>";
    		echo "<td>" .  $row["nazwisko"] . "</td>";
        echo "<td>" .  $row["specjalizacja"] . "</td>";


        echo "<td id='button'><button  class='button' onclick='url(" . $row['id'] . ",\"" . $row["imie"] . "\",\"" . $row["nazwisko"] . "\",\"" . "\",\"" . $user . "\",\"" .  "\"". ")'>Opinie</button></td>";
    		echo "</tr>";
      }
    	echo"</table>";
    	 }


      ?>

      <br>
    </main>
  </body>
</html>
