<?php
include '../Conexion/conexion.php';

    $sql2="Truncate table listado";
   $result2 = mysqli_query($connection,$sql2 ); 

 if ($result2) {
     
 echo "<script type=\"text/javascript\">
alert(\"Eliminado Correctamente.\");
window.location = \"../index.php\"
</script>";
 }
 else echo "Something went wrong: " . mysql_error();


?>