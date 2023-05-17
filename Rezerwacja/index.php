<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Strona Główna</title>
  </head>
  <body>
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
		
	echo'<table border="1">';
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
		echo '<td> <button name="Zarezerwuj" type="submit">Zarezerwuj</button> </td>';
  
		echo "</tr>";
	}

	
	
	
	echo"</table>";
	
	}
	
	}
	else{
		echo'Wybierz specjalizacje z listy';
	}



  ?>
  

  
  
  
  
  
  
  
  </body>
</html>