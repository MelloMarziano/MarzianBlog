<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Marzian Blog CPanel</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="js/jquery-1.12.1.js"></script>	
	<script src="js/bootstrap.js"></script>	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="caja">
					<form action="principal.php" method="post">
						<div class="form-group">
							<label for="correo">Correo Electronico</label>
							<input type="email" name="correo" class="form-control">
						</div>
						<div class="form-group">
							<label for="pw">Contraseña</label>
							<input type="password" name="pw" class="form-control">
						</div>
						<input type="submit" value="ENTRAR" class="btn btn-success btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>