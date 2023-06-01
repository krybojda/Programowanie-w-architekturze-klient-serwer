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
      $czas=date("Y-m-d");

      echo "<h1>" .  $imie ." " .  $nazwisko . "</h1>";

      $query = mysqli_query($con, "SELECT * FROM opinie WHERE id_lekarza = $id");
        if (mysqli_num_rows($query) > 0) {
      echo "<br><br><h2>Napisz opinie</h2>";

      echo'<form name="komentarz" method="post">';
      echo '  <textarea name="Komentarz" cols="50" rows="10" method="post"></textarea>';
      echo '<div class = "guzik">';

      echo "<button name = 'wyslij' class='button1' type='submit'>Wyślij</button>";
      echo '</div></form>';

        if(isset($_POST['wyslij'])){
        $kom = $_POST['Komentarz'];
        mysqli_query($con, "INSERT INTO opinie (id,id_lekarza,imie,nazwisko,data,opinia,ocena) VALUES ('',\"$id\",\"$imie\",\"$nazwisko\",\"$czas\",\"$kom\",3)");
      }


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
        echo "</tr>";
      }
      echo"</table>";
    }else {
      echo "<br><br><h2>Brak opinii</h2>";
    }
       ?>
       <br>
     </main>
   </body>
 </html>
