<?php
include '../Conexion/conexion.php';


$query ="SELECT * FROM fylsa.empleado";

$result= mysqli_query($connection, $query) or die();

while($row = mysqli_fetch_array($result)){
    
	echo "<tr><td>".$row[0]."<td></tr>";
}



?>