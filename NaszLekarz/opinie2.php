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

       <?php
    	include 'connect.php';
      $imie = $_GET["imie"];
      $nazwisko = $_GET["nazwisko"];
      $id=$_GET["id"];


      echo "<h1>" .  $imie ." " .  $nazwisko . "</h1>";

      $query = mysqli_query($con, "SELECT * FROM opinie WHERE id_lekarza = $id");
        if (mysqli_num_rows($query) > 0) {
            echo "<br><br><h2>Napisz opinie</h2>";
      echo "<br><br><br>";
    echo '  <textarea name="Komentarz" cols="50" rows="10"></textarea>';
      echo '  <input type="submit" value="Wyślij formularz">';
      echo'<table>';
      echo"<tr>";
        echo"<th>Data</th>";
        echo"<th>Opinia</th>";
        echo"<th>Ocena</th>";
      echo"</tr>";

      while($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td>" .  $row["data"] . "</td>";
        echo "<td>" .  $row["opinia"] . "</td>";
        echo "<td>" .max(1, min(5, $row["ocena"])). "</td>";


        //echo "<td id='button'><button  class='button' onclick='url(" . $row['id'] . ",\"" . $row["imie"] . "\",\"" . $row["nazwisko"] . "\",\"" . "\",\"" . $user . "\",\"" .  "\"". ")'>Opinie</button></td>";
        echo "</tr>";
      }
      echo"</table>";
    }else {
      echo "<br><br><h2>Brak opinii</h2>";
    }
      // $id=$_GET["id"];
      // $typ=$_GET["typ"];
      //     if(isSet($_GET["imie"])){
      //         mysqli_query($con, 'INSERT INTO rezerwacje (id, imie, nazwisko, data, godzina, nr_gabinetu, login)
      //            VALUES ("", "' . $_GET["imie"] . '", "' . $_GET["nazwisko"] . '", "' . $_GET["data"] . '", "' . $_GET["godzina"] . '", "' . $_GET["nrgabinetu"] . '", "' . $_GET["user"] . '")');
      //
      //     }

       ?>

       <br>
     </main>
   </body>
 </html>
