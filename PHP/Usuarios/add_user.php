<?php
include ("../Conexion/conexion.php");
$nombre = $_POST['nombre'];
$puesto = $_POST['puesto'];
$correo = $_POST['correo'];
$cuenta = $_POST['cuenta'];
/*
Validamos que el usuario no exista
 */

 $query ="SELECT nombre FROM empleado where nombre='$nombre' ";

 $result= mysqli_query($connection, $query) or die();


 $row=mysqli_num_rows($result);
 if ($row==1) {
   /*
   Siginifica que el usuario ya existe en la Base de datos
    */
    echo "<script type=\"text/javascript\">
    alert(\"El usuario ya Existe.\");
    window.location = \"../index.php\"
    </script>";

 }else {
   /*
   El usuario no existe en la base de datos asi que se agrega
    */
   $sql = "INSERT INTO empleado (nombre,puesto,correo,cuenta)
   VALUES ('$nombre','$puesto','$correo','$cuenta')";

   if (mysqli_query($connection, $sql)) {
     echo "<script type=\"text/javascript\">
     alert(\"El Usuario se agrego correctamente.\");
     window.location = \"../index.php\"
     </script>";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($connection);
   }


 }
mysqli_close($connection);


?>
