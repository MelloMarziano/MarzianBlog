<?php include("conexion/conexion.php"); 
SESSION_START();
SESSION_UNSET();
SESSION_DESTROY();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Marzian Blog</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/scroll.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="js/jquery-1.12.1.js"></script>	
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).on('ready',function(){
			$('.fecha2').val(fecha);
			$('.botones').show(1500);
			$('.noticias').show(1500);
			$('.mas').on('click',function(){
				window.location.href="todo.php";
			});
			$('.home').on('click',function(){
				$('.botones').show(1500);
				$('.noticias').show(1500);
				$('.contactar').hide(500);
			});
			$('.noticia').on('click',function(){
				window.location.href="noticias.php";
			});
			$('.contacto').on('click',function(){
				$('.noticias').hide(500);
				$('.contactar').show(1500);
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
	<header class="navbar navbar-top-fixed">
		<div class="row ">
			<div class="col-xs-12 arriba1 ">
				<h2>MarzianClan <small><a href="login.php" class="btn btn-xs btn-link">Cpanel</a></small></h2>
			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-2 menu visible-md visible-lg">
				<div class="botones">
					<div class="boton home">
						<span class="letra glyphicon glyphicon-home">HOME</span>
					</div>
					<div class="boton noticia">
						<span class="letra glyphicon glyphicon-bullhorn">NOTICIAS</span>
					</div>
					<div class="boton contacto">
						<span class="letra glyphicon glyphicon-envelope">CONTACTO</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 visible-xs visible-sm menuXS">
				<ul class="">
					<li class="home btn btn-link btn-sm">HOME</li>
					<li class="noticia btn btn-link btn-sm">NOTICIAS</li>
					<li class="contacto btn btn-link btn-sm">CONTACTO</li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-10 principal">
				<div class="noticias">
					<?php 
						$consulta="SELECT * FROM entradas ORDER BY id_entrada  DESC LIMIT 0,10";
						$res=$con->query($consulta);
						while($fila=$res->fetch_array()){
					 ?>
					<article class="articulos">		
						<h3><?php echo $fila['titulo']; ?></h3>
						<hr class="lineashr">
						<small>By <?php echo $fila['autor']; ?> <span class="hora"> <?php echo $fila['fecha'] ?></span></small>
						<hr class="lineashr">
						<img src="img/imagenes/<?php echo $fila['foto']; ?>" alt="" class="img-responsive imagen">
						<br>
						<p><?php echo substr($fila['mensaje'],0,50)." ..." ?></p>
						<a href="todo.php?id=<?php echo $fila['id_entrada']; ?>" class="btn btn-success btn-sm">Leer Mas...</a>
						<hr class="lineashr">
						<hr class="lineashr">
					</article>
					<?php 
					}

					 ?>
				</div>
				<div class="contactar">
					<form action="contacto.php" method="post">
						<div class="form-group">
							<input type="hidden" name="fecha" class="fecha2">
						</div>
						<div class="form-group">
							<label for="de">De: </label>
							<input type="text" name="de" class="form-control" placeholder="Remitente" required>
						</div>
						<div class="form-group">
							<label for="para">Para : </label>
							<input type="text" name="para" class="form-control" placeholder="Destinatario" required>
						</div>
						<div class="form-group">
							<label for="asunto">Asunto : </label>
							<input type="text" name="asunto" class="form-control" placeholder="Asunto" required>
						</div>
						<div class="form-group">
							<label for="mensaje">Mensaje : </label>
							<textarea name="mensaje" id="" cols="30" rows="10" class="form-control" placeholder="Mensaje a enviar" required></textarea>
						</div>
						<input type="submit" value="Enviar" class="btn btn-danger">
					</form>
				</div>
			</div>
		</div>
	</div>
	

	


</body>
</html>