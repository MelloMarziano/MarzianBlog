<?php 
	SESSION_START();
	include("conexion/conexion.php");
	$correo=$_POST['correo'];
	$pass=$_POST['pw'];

	$correo=filter_var($correo,FILTER_SANITIZE_EMAIL);
	$pass=filter_var($pass,FILTER_SANITIZE_STRING);
	echo $correo."<br>";
	echo $pass."<br>";
	$consulta="SELECT * FROM usuario WHERE correo='$correo' AND contrasenia='$pass'";
	$res=$con->query($consulta);
	while($fila=$res->fetch_array()){
		print_r($fila);
		if($fila['correo']==$correo && $fila['contrasenia']==$pass){
			$_SESSION['nombre']=$fila['nombre'];
			$_SESSION['apellido']=$fila['apellido'];
			header("location:administrador.php");
		}else{
			header("location:login.php");
		}
	}
	
	
 ?>