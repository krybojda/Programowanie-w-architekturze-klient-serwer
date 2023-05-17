<html>
<body>

<?php

$host = 'localhost'; 
$user = 'root';  
$pass = ''; 
$name = 'naszlekarz';



$con = @mysqli_connect($host,$user,$pass,$name);

if(!$con){
	echo "Error: " . mysqli_connect_error();
	exit();
}
else {
	echo "Połączono z bazą";
}


?>
</body>
</html>