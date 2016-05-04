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
			$('#home2').on('click',function(){
				window.location.href="index.php";
			});
			$('#home').on('click',function(){
				$('.botones').show(1500);
				$('.noticias').show(1500);
				$('.contactar').hide(500);
			});
			$('.contacto').on('click',function(){
				window.location.href="index.php";
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
	<div class="container-fluid">
		<div class="row ">
			<div class="col-xs-12 arriba1">
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
				</div>
			</div>
			<div class="col-xs-12 visible-xs visible-sm menuXS">
				<ul class="">
					<li class="home btn btn-link btn-sm" id="home2">HOME</li>
					<li class="noticia btn btn-link btn-sm">NOTICIAS</li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-10 principal">
				<div class="noticias">
					<?php 
						$consulta="SELECT * FROM entradas ORDER BY id_entrada DESC";
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
			</div>
		</div>
	</div>


</body>
</html>