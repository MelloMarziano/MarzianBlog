<?php include("conexion/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/scroll.css">
	<script src="js/jquery-1.12.1.js"></script>	
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).on('ready',function(){
			$('.botones').show(1500);
			$('.noticias').show(1500);
			$('.fecha').val(fecha);
			$('#home').on('click',function(){
				window.location.href="index.php";
			});
		});
		var fecha=function(){
			var ahora= new Date();
			var dia=ahora.getDate(),
				mes=ahora.getMonth(),
				year=ahora.getFullYear();
			var meses=['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Oct','Nov','Dic'];
			var fecha=dia+"/"+meses[mes]+"/"+year;
			return fecha;
		};
	</script>
	

</head>
<body>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-xs-12 arriba1 visible-md visible-lg">
				<h1>MarzianClan</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2 menu visible-md visible-lg">
				<div class="botones">
					<div class="boton" id="home">
						<span class="letra glyphicon glyphicon-home">HOME</span>
					</div>
					<div class="boton">
						<span class="letra glyphicon glyphicon-bullhorn">NOTICIAS</span>
					</div>
					<div class="boton">
						<span class="letra glyphicon glyphicon-envelope">CONTACTO</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-10 principal">
				<div class="noticias">
					<?php
						$id=$_GET['id'];
						$consulta="SELECT * FROM entradas WHERE id_entrada=$id";
						$res=$con->query($consulta);
						$fila=$res->fetch_array();
					 ?>
					<article class="articulos">		
						<h3><?php echo $fila['titulo']; ?> <small>By <?php echo $fila['autor']; ?> <span class="hora"> <?php echo $fila['fecha'] ?></span></small></h3>
						<img src="img/imagenes/<?php echo $fila['foto'] ?>" alt="" class="img-responsive imagen">
						<br>
						<p><?php echo $fila['mensaje'] ?></p>
						<br>
						COMENTARIOS:
						<br>
						<?php 
							$consulta="SELECT * FROM comentario WHERE id_entrada=$id";
							$res=$con->query($consulta);
							while($fila2=$res->fetch_array()){
						?>
					<article class="comentarios">
						 <b class="color-nombre"><?php echo $fila2['nombre']; ?></b> : <span><?php echo $fila2['comentario']; ?></span>&nbsp;<small> -- <?php echo $fila2['fecha']; ?></small>
						 <br>
					</article>
						<?php 
							}
						 ?>
						 <form action="comen.php" method="post">
						 	<div class="form-group">
						 		<input type="hidden" name="hora" class="fecha">
						 		<input type="hidden" name="id" class="id" value="<?php echo $id;?>">
						 	</div>
						 	<div class="form-group">
						 		<label for="">Nombre: </label>
						 		<input type="text" name="nombre" class="form-control" required>
						 	</div>
						 	<div class="form-group">
						 		<label for="">Comentario: </label>
						 		<input type="text" name="comentario" class="form-control" required>
						 	</div>
						 	<input type="submit" value="Comentar" class="btn btn-success">
						 </form>
					</article>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 pie">
				<h6 class="pieT">Marzian Clan Entertaiment 2016 by Eliu Ortega &reg;</h6>
			</div>
		</div>
	</div>


</body>
</html>