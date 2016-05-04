<?php 
	include("conexion/conexion.php");
	//$nombre=filter_var($nombre,FILTER_SANITIZE_STRING);
	
	$desde=$_POST['de'];
	$para=$_POST['para'];
	$fecha=$_POST['fecha'];
	$asunto=$_POST['asunto'];
	$mensaje=$_POST['mensaje'];
	echo $fecha;
	$desde=filter_var($desde,FILTER_SANITIZE_EMAIL);
	$para=filter_var($para,FILTER_SANITIZE_EMAIL);
	$asunto=filter_var($asunto,FILTER_SANITIZE_STRING);
	$mensaje=filter_var($mensaje,FILTER_SANITIZE_STRING);


	$consulta="INSERT INTO correo(desde,para,fecha,asunto,mensaje) VALUES (?,?,?,?,?)";
	if($stmt=$con->prepare($consulta)){
		$stmt->bind_param('sssss',$desde,$para,$fecha,$asunto,$mensaje);
		$stmt->execute();
		$stmt->close();
		mail($para,$asunto,$mensaje); 
		header("location:index.php");
	}else{
		echo "Error al ejecutar la sentencia preparada ".$con->error;
	}
 ?>