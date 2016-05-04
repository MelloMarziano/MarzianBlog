<?php 
	include("conexion/conexion.php");

	$categoria=$_POST['categorias'];
	$categoria=filter_var($categoria,FILTER_SANITIZE_STRING);

	$consulta="INSERT INTO categorias(categorias) VALUES(?)";
	if($stmt=$con->prepare($consulta)){
		$stmt->bind_param('s',$categoria);
		$stmt->execute();
		$stmt->close();
		header("location:administrador.php");
	}else{
		echo "no guardo nada...";
	}



 ?>