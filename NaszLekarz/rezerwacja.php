<?php
include 'connect.php';
$id=$_GET["id"];
$typ=$_GET["typ"];
    if(isSet($_GET["imie"])){
        mysqli_query($con, 'INSERT INTO rezerwacje (id, imie, nazwisko, data, godzina, nr_gabinetu, login)
           VALUES ("", "' . $_GET["imie"] . '", "' . $_GET["nazwisko"] . '", "' . $_GET["data"] . '", "' . $_GET["godzina"] . '", "' . $_GET["nrgabinetu"] . '", "' . $_GET["user"] . '")');
           $sql = "DELETE FROM $typ WHERE id=$id";
           $query = mysqli_query($con,$sql);
    }

        
        
   echo '<script type="text/javascript">
   window.location = "rezerwacje.php";
   </script>';
 ?>
