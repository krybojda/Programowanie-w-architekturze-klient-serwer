<!DOCTYPE html>
<html>
  <head>
    <title>Strona Główna</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f2f2f2;
}
header {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
}
nav {
  background-color: #f2f2f2;
  border: 1px solid #ccc;
  padding: 10px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}
li {
  float: left;
}
li a {
  display: block;
  color: #333;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li a:hover {
  background-color: #ddd;
}
main {
  padding: 20px;
}
h1 {
  text-align: center;
  font-size: 36px;
}
form {
  width: 50%;
  margin: 0 auto;
  border: 1px solid #ccc;
  padding: 10px;
}
label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}
input[type="text"],
select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
}
input[type="submit"] {
  background-color: #333;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type="submit"]:hover {
  background-color: #ddd;
  color: #333;
}
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  text-align: center;
}
th,
td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
#button{
border: none;
.button{
display: inline-block;
padding: 10px 20px;
background-color: #808080 ;
color: white;
border: none;
text-align: center;
text-decoration: none;
font-size: 16px;
cursor: pointer;
}
.button:hover {
background-color: #45a049;
}
.button:active {
background-color: #3e8e41;
}
}

</style>
  <body>
    <header>
      <h1>Nasz Lekarz</h1>
    </header>
    <nav>
      <ul>
        <li><a href="#">Strona główna</a></li>
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
