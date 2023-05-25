<?php
include 'connect.php';
$id=$_GET["id"];
    if(isSet($_GET["imie"])){
        mysqli_query($con, 'SELECT * FROM lekarze WHERE specjalizacja = "alergologia" ');


    }

 ?>
