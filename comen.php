<?php 
include("conexion/conexion.php");
$id=$_POST['id'];
$fecha=$_POST['hora'];
$nombre=$_POST['nombre'];
$comentario=$_POST['comentario'];

$nombre=filter_var($nombre,FILTER_SANITIZE_STRING);
$comentario=filter_var($comentario,FILTER_SANITIZE_STRING);

$consulta="INSERT INTO comentario(id_entrada,fecha,nombre,comentario) VALUES (?,?,?,?)";
if($stmt=$con->prepare($consulta)){
	$stmt->bind_param('isss',$id,$fecha,$nombre,$comentario);
	$stmt->execute();
	$stmt->close();
	header("location:todo.php?id=$id");
}else{
	echo "Error al ejecutar la sentencia preparada ".$con->error;
}
 ?>