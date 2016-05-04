<?php 
	include("conexion/conexion.php");

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$pw=$_POST['pw'];
	$nombre=filter_var($nombre,FILTER_SANITIZE_STRING);
	$apellido=filter_var($apellido,FILTER_SANITIZE_STRING);
	$telefono=filter_var($telefono,FILTER_SANITIZE_STRING);
	$correo=filter_var($correo,FILTER_SANITIZE_EMAIL);
	$pw=filter_var($pw,FILTER_SANITIZE_STRING);

	$consulta="INSERT INTO usuario(nombre,apellido,telefono,correo,contrasenia) VALUES(?,?,?,?,?)";
	if($stmt=$con->prepare($consulta)){
		$stmt->bind_param('sssss',$nombre,$apellido,$telefono,$correo,$pw);
		$stmt->execute();
		$stmt->close();
		header("location:administrador.php");
	}else{
		echo "<h1>Upss!! Lo siento, Este Correo ya esta en uso por favor Vuelve a Registrarte</h1>";
	}



 ?>