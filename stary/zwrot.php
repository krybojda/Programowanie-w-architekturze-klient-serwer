<?php
if(isSet($_GET["idzamow"])){
    $idzamow = $_GET["idzamow"];
    $con = mysqli_connect("localhost","root","","naszlekarz");
    $queryRezerwacje = mysqli_query($con,"SELECT * FROM Rezerwacje WHERE id_Rezerwacje=$idzamow");
    while($rowRezerwacje = mysqli_fetch_assoc($queryRezerwacje)){
        $tabela = $rowRezerwacje["tabela"];
        $id = $rowRezerwacje["nazwa"];
        $sql = "SELECT * FROM $tabela WHERE nazwa='$id'";
        $queryilosc = mysqli_query($con,$sql);
        while($rowilosc = mysqli_fetch_assoc($queryilosc)){
            $iloscwtabeli = $rowilosc["ilosc"];
            $iloscwtabeli = $iloscwtabeli + ($rowRezerwacje["suma"] / $rowRezerwacje["cena"]);
            $sqlt = "UPDATE $tabela SET ilosc = $iloscwtabeli WHERE nazwa='$id'";
            $queryt = mysqli_query($con,$sqlt);
        }
    }
    $sql = "DELETE FROM Rezerwacje WHERE id_Rezerwacje=$idzamow";
    $query = mysqli_query($con,$sql);
}
echo '<script type="text/javascript">
     window.location = "index.php";
     </script>';
 ?>