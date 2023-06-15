<!DOCTYPE html>
<html>
  <head>
    <title>Kontakt</title>
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
        <li><a href="NasiLekarze.php">Nasi Lekarze</a></li>
        <li><a href="opinie.php">Opinie</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
        <li><a href='user.php'>Użytkownik</a></li>
        <li><a href="wyloguj.php">Wyloguj</a></li>
      </ul>
    </nav>
    <?php
	include 'connect.php';
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
      <h1>Kontakt </h1>
	  <br><br>
	  <h2>Lista lekarzy</h2>

      <?php
      include 'connect.php';




    	$query = mysqli_query($con, "SELECT * FROM lekarze");
        if (mysqli_num_rows($query) > 0) {

    	echo'<table>';
    	echo"<tr>";
    		echo"<th>Imie</th>";
    		echo"<th>Nazwisko</th>";
        echo"<th>Specjalizacja</th>";
        echo"<th>Telefon</th>";
        echo"<th>E-mail</th>";

    	echo"</tr>";

    	while($row = mysqli_fetch_assoc($query)) {
    		echo "<tr>";
    		echo "<td>" .  $row["imie"] . "</td>";
    		echo "<td>" .  $row["nazwisko"] . "</td>";
        echo "<td>" .  $row["specjalizacja"] . "</td>";
        echo "<td>" .  $row["telefon"] . "</td>";
        echo "<td>" .  $row["e-mail"] . "</td>";
    		echo "</tr>";
      }
    	echo"</table>";
    	 }


      ?>

      <br><br><br>
      <h1>Kontakt do kliniki</h1>
	  <p>955900299</p>
          <h1>Adres:</h1>
          <p>ul.Piłsudskiego 25</p>
	  <p>58-500 Jelenia Góra</p>
          <h1>E-mail:</h1>
          <p>nasz.lekarz@szpital.pl<p>
    </main>
  </body>
</html>
