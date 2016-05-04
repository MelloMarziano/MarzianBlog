<?php 
include("conexion/conexion.php");

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/paginacion.css">
	<script src="js/jquery-1.12.1.js"></script>	
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).on('ready',function(){
			$('#home').on('click',function(){
				window.location.href="administrador.php";
			});

		});
	</script>
	

</head>
<body>

	<div class="container-fluid">
		<div class="row ">
			<div class="col-xs-12 arriba1">
				<h1>MarzianClan <small>Mail</small></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 hidden-xs hidden-sm lateral">
				<div class="botones">
					<div class="boton" id="home">
						<span class="letra glyphicon glyphicon-home home">HOME</span>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-10 mensaje">
				<div class="table-responsive">
					<form action="borrar.php" method="post">
						<table class="table table-striped table-hover">
							<thead>
								<tr class="danger">
									<th>X</th>
									<th>#</th>
									<th>De</th>
									<th>Asunto</th>
									<th>Fecha</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$pagina=isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
									$mensajePorPagina=10;

									$inicio=($pagina > 1) ? ($pagina * $mensajePorPagina - $mensajePorPagina) : 0;

									$consulta="SELECT * FROM correo LIMIT $inicio,$mensajePorPagina";
									$res=$con->query($consulta);
									
									if(!$res){
										echo "<div class='jumbotron' ><h2>No hay Mensajes para mostrar</h2></div>";
									}else{
										
										while($articulos=$res->fetch_array()){
											
									?>
										<tr>
											<td><input type="checkbox" name="borrar" value=" <?php echo $articulos['id']; ?>"></td>
											<td><?php echo $articulos['id']; ?></td>
											<td><?php echo $articulos['desde']; ?></td>
											<td><?php echo $articulos['asunto']; ?></td>
											<td><?php echo $articulos['fecha']; ?></td>
										</tr>
									<?php } ?>
							</tbody>
						</table>
						<input type="submit" value="Eliminar" class="btn btn-danger">
					</form>
						<?php
							}
							$totalArticulo=$con->query('SELECT * FROM correo');
							$totalArticulo=$totalArticulo->num_rows;
							$numeroPagina=ceil($totalArticulo/$mensajePorPagina);		
						?>
				</div>
				<section class="paginacion">
					<ul>
						<?php if ($pagina==1): ?>
							<li class="disabled">&laquo;</li>
						<?php else: ?>
							<li class=""><a href="?pagina=<?php echo $pagina - 1; ?>">&laquo;</a></li>
						<?php endif; ?>

						<?php 
							for ($i=1; $i <=$numeroPagina; $i++) { 
								if($pagina==$i){
									echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
								}else{
									echo "<li><a href='?pagina=$i'>$i</a></li>";
								}
							}
						 ?>
						<?php if ($pagina==$numeroPagina): ?>
							<li class="disabled">&raquo;</li>
						<?php else: ?>
							<li class=""><a href="?pagina=<?php echo $pagina + 1; ?>">&raquo;</a></li>
						<?php endif; ?>

					</ul>
				</section>
			</div>
		</div>
	</div>


</body>
</html>