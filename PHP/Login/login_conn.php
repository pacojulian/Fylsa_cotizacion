<?php

include ("../Conexion/conexion.php");
SESSION_START();




if(isset($_POST['user']) && isset($_POST['pass']))
{
      $user = mysqli_real_escape_string($connection,$_POST['user']);
      $pass = mysqli_real_escape_string($connection,$_POST['pass']);
    //echo "<script> alert(" . $user . "); </script>";
    //echo $user;



$query ="SELECT usuario FROM USUARIO where usuario='$user' AND password ='$pass'";

$result= mysqli_query($connection, $query) or die();

$row=mysqli_num_rows($result);
if ($row==1) {
  # code...
  $data= mysqli_fetch_array($result);

echo  1;
//  $_SESSION['user']=$data['user'];
    $_SESSION['usuario']=$user;

}else {
  echo 2;
}
}



 ?>
