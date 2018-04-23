<?php
include '../Conexion/conexion.php';
$sql2="Truncate table listado";
   $result2 = mysqli_query(  $connection,$sql2 );


if(isset($_POST["Import"])){

echo $filename=$_FILES["file"]["tmp_name"];

if($_FILES["file"]["size"] > 0)
{

$file = fopen($filename, "r");
while (($emapData = fgetcsv($file, 1000, ",")) !== FALSE)
{


//It wiil insert a row to our subject table from our csv file`
$sql = "INSERT into listado (`Clave`, `Descripcion`,`Um`,`Precio_obra`, `Precio_sum`)
values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]')";
//we are using mysql_query function. it returns a resource on true else False on error



$result = mysqli_query( $connection,$sql );
if(! $result )
{
echo "<script type=\"text/javascript\">
alert(\"Invalid File:Please Upload CSV File.\");
window.location = \"index.php\"
</script>";
}
}
fclose($file);
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\"CSV File has been successfully Imported.\");
window.location = \"../index.php\"
</script>";
//close of connection
mysql_close($connection );
}
}
?>
