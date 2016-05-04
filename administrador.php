<?php include ("conexion/conexion.php"); 
	SESSION_START();
	$nom=$_SESSION['nombre'];
	$apelli=$_SESSION['apellido'];
	if($nom=="" && $apelli==""){
		echo "<div class='jumbotron'><h1>No esta autorizado a estar en esta parte</h1></div>";
	}else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/admin.css">
	<script src="js/jquery-1.12.1.js"></script>	
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).on('ready',function(){
			$('#home').on('click',function(){
				$('.postear').hide("fast");
				$('.categoria').hide("fast");
				$('.usuarios').hide("fast");
				$('.inicio').show(1500);
				
			});

			$('#entrada').on('click',function(){
				$('.inicio').hide("fast");
				$('.categoria').hide("fast");
				$('.usuarios').hide("fast");
				$('.postear').show(1000);
			});
			$('#mail').on('click',function(){
				window.location.href='mensajes.php';
			});
			$('#category').on('click',function(){
				$('.inicio').hide("fast");
				$('.postear').hide("fast");
				$('.usuarios').hide("fast");
				$('.categoria').show(1500);
			});
			$('#user').on('click',function(){
				$('.inicio').hide("fast");
				$('.postear').hide("fast");
				$('.categoria').hide("fast");
				$('.usuarios').show(1500);
			})

			$('.tiempo').val(fecha())
		})

		var fecha=function(){
			var ahora= new Date();
			var dia=ahora.getDate(),
				mes=ahora.getMonth(),
				year=ahora.getFullYear(),
				hora=ahora.getHours(),
				minutos=ahora.getMinutes(),
				segundo=ahora.getSeconds();
			var meses=['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Oct','Nov','Dic'];
			if(segundo<10){
					segundo="0"+segundo;
				}
				if(minutos<10){
					minutos="0"+minutos;
				}
				if(hora<10){
					hora="0"+hora;
				}

			var fecha=dia+"/"+meses[mes]+"/"+year+" -- "+hora+":"+minutos+":"+segundo;

			return fecha;

		};
	</script>
	

</head>
<body>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-xs-12 arriba1">
				<h1>MarzianClan <small>Cpanel</small></h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 hidden-xs hidden-sm lateral">
				<div class="botones">
					<div class="boton" id="home">
						<span class="letra glyphicon glyphicon-home home">HOME</span>
					</div>
					<div class="boton" id="entrada">
						<span class="letra glyphicon ">+POST</span>
					</div>
					<div class="boton" id="category">
						<span class="letra glyphicon glyphicon-duplicate">CATEGORY</span>
					</div>
					<div class="boton" id="mail">
						<span class="letra glyphicon glyphicon-envelope">Mail</span>
					</div>
					<div class="boton" id="user">
						<span class="letra glyphicon glyphicon-user">USERS</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-10 inicio">
				<div class="row">
					<div class="jumbotron">
						<h1>Bienvenido <?php echo $nom." ".$apelli; ?> </h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 board rojo">
						<div class="col-xs-2 side">
							<span class="glyphicon glyphicon-plus"></span>
						</div>
						<div class="col-xs-8 centro">
						<?php 
							$consulta="SELECT * FROM entradas";
							$res=$con->query($consulta);
							$fila=$res->num_rows;
					 	?>
							<?php echo $fila; $res->close();?> <br> Entradas
						</div>			
					</div>
					<div class="col-xs-4 board azul">
						<div class="col-xs-2 side">
							<span class="glyphicon glyphicon-align-left"></span>
						</div>
						<div class="col-xs-8 centro">
							<?php 
								$consulta="SELECT * FROM comentario";
								$res=$con->query($consulta);
								$fila=$res->num_rows;
					 		?>
							<?php echo $fila; $res->close();?> <br> Comentarios
						</div>
					</div>

					<div class="col-xs-4 board verde">
						<div class="col-xs-2 side">
							<span class="glyphicon glyphicon-envelope"></span>
						</div>
						<div class="col-xs-8 centro">
							<?php 
								$consulta="SELECT * FROM correo";
								$res=$con->query($consulta);
								$fila=$res->num_rows;
					 		?>
							<?php echo $fila; $res->close();?> <br> Mensajes
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-10 postear">
				<form action="postear.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="titulo">Titulo</label>
						<input type="text" name="titulo" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="autor">Autor</label>
						<input type="text" name="autor" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="autor">Categorias</label>
						<select name="categoria" class="form-control">
							<?php 
								$consulta="SELECT * FROM categorias";
								$res=$con->query($consulta);
								while($fila=$res->fetch_array()){
							 ?>
							 <option value="<?php echo $fila['id']; ?>" ><?php echo $fila['categorias']; ?></option>
						
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="fecha">Fecha</label>
						<input type="text" name="fecha"  class="form-control tiempo" readonly>
					</div>
					<div class="form-group">
						<label for="foto">Imagen</label>
						<input type="file" name="imagen" id="imagen" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mensaje">Mensaje</label>
						<textarea name="mensaje" class="form-control" id="" cols="30" rows="10" required></textarea>
					</div>
						<div class="checkbox">
							<div class="col-sm-2">
								Aceptar Comentarios
							</div>
							<div class="col-sm-2">
								<input type="checkbox" name="comentarios" value="1" >
							</div>
						</div>
						<br><br>
						<input type="submit" class="btn btn-primary btn-block" name="submit" value="Guardar">
				</form>
			</div>
			<div class="col-xs-12 col-md-10 categoria">
				<div class="jumbotron">
					<h1>Categorias</h1>
				</div>
				<br>
				<ul>
				<?php 
					$consulta="SELECT * FROM categorias";
					$res=$con->query($consulta);
					while($fila=$res->fetch_array()){
				 ?>
				 	<li><?php echo $fila['id'].".- ".$fila['categorias']; ?></li>
				 <?php } ?>
				 </ul>
				<form action="categoria.php" method="post">
					<div class="form-group">
						<label for="categorias">Nombre de Categoria: </label>
						<input type="text" name="categorias" class="form-control">
					</div>
					<input type="submit" value="Registrar" class="btn btn-warning btn-lg">
				</form>
			</div>
			<div class="col-xs-12 col-md-10 usuarios">
				<div class="jumbotron">
					<h2>Usuarios</h2>
				</div>
				<br>
				<form action="usuarios.php" method="post">
					<div class="form-group">
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" class="form-control">
					</div>
					<div class="form-group">
						<label for="apellido">Apellido: </label>
						<input type="text" name="apellido" class="form-control">
					</div>
					<div class="form-group">
						<label for="telefono">Telefono: </label>
						<input type="text" name="telefono" class="form-control">
					</div>
					<div class="form-group">
						<label for="correo">Correo Electronico: </label>
						<input type="email" name="correo" class="form-control">
					</div>
					<div class="form-group">
						<label for="pw">Password: </label>
						<input type="password" name="pw" class="form-control">
					</div>
					<input type="submit" value="Registrar" class="btn btn-warning btn-lg">
				</form>
			</div>
		</div>
	</div>


</body>
</html>
<?php } ?>