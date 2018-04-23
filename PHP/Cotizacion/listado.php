<?php
//Archivo de conexión a la base de datos
include '../Conexion/conexion.php';

//Variable de búsqueda
$consultaBusqueda = $_POST['search'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "<", ">", "'");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysqli_query($connection, "Select * from listado where Descripcion like '%$consultaBusqueda%'");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>Error</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		
		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$clave = $resultados['Clave'];
			$descripcion = $resultados['Descripcion'];
			$Um = $resultados['Um'];
            $pmo = $resultados['Precio_obra'];
            $psum = $resultados['Precio_sum'];

			//Output
			$mensaje .= '
           <tr>
            <td class="col-xs-2">'. $clave .'</td>
            <td class="col-xs-6">'. $descripcion .'</td>
            <td class="col-xs-1">'. $Um .'</td>
            <td class="col-xs-1">'. $pmo .'</td>
            <td class="col-xs-2">'. $psum .'</td></tr>';
            
            
			

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>