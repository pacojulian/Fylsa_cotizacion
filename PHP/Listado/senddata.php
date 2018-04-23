<?php
include '../Conexion/conexion.php';
//include 'truncate.php';
$data = $_POST['file'];
$handle = fopen($data, "r");
$test = file_get_contents($data);



if ($handle) {
    
        $sql2="Truncate table listado";
   $result2 = mysqli_query(connection,$sql2 ); 



    $counter = 0;
    //instead of executing query one by one,
    //let us prepare 1 SQL query that will insert all values from the batch
    $sql ="INSERT INTO listado(Clave,Descripcion,Um,Precio_obra,Precio_sum) VALUES ";
    while (($line = fgets($handle)) !== false) {
      $sql .= "($line),";
      $counter++;
    }
    $sql = substr($sql, 0, strlen($sql) - 1);
     if ($connection->query($sql) === TRUE) {
    } else {
     }
    fclose($handle);
} else {  
} 
//unlink CSV file once already imported to DB to clear directory
unlink($data);
?>