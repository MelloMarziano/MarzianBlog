<?php 

	include("conexion/conexion.php");
	
	if(isset($_POST['submit'])){
		$titulo=$_POST['titulo'];
		$autor=$_POST['autor'];
		$fecha=$_POST['fecha'];
		$categoria=$_POST['categoria'];
		$mensaje=$_POST['mensaje'];
		$permite=$_POST['comentarios'];

		$pos = strrpos($fecha, " ");
		$totalFoto=substr($fecha, $pos);

		$foto=$_FILES['imagen']['name'];
		$ruta="img/imagenes/imagen".date('H').date('i').date('s').$foto;
		$imagen=$foto;
		$titulo=filter_var($titulo,FILTER_SANITIZE_STRING);
		$autor=filter_var($autor,FILTER_SANITIZE_STRING);
		$mensaje=filter_var($mensaje,FILTER_SANITIZE_STRING);
		move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);



		$consulta="INSERT INTO entradas (id_categorias,titulo,autor,fecha,foto,mensaje,aceptar) VALUES(?,?,?,?,?,?,?)";
		if($stmt=$con->prepare($consulta)){
			$stmt->bind_param('issssss',$categoria,$titulo,$autor,$fecha,$imagen,$mensaje,$permite);
			$stmt->execute();
			$stmt->close();
			header("location:administrador.php");
		}else{
			echo "Error al ejecutar la sentencia preparada ".$con->error;
		}
	}else{
		echo "no se pudo guardar Nada ";
	}
	
	/*

	$consulta="INSERT INTO entrada VALUES(?,?,?,?,?,?)";
	if($st=$con->prepare($consulta)){
		$st->bind_param("sssssd",$titulo,$autor,$fecha,$foto,$mensaje,$permite);
		$stm->execute();
		$st->close();
		header("location:administrador.php");
	}else{
		echo "Error al ejecutar la sentencia preparada".$mysqli->error;
	}

*/

 ?>