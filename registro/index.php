<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registro</title>
		<!--<link rel="stylesheet" type="text/css" href="css/registro.css">-->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="controlador.js"></script>	
		<script type="text/javascript" src="js/bootstrap.min.js"></script>	
		<!--<script type="text/javascript" src="js/registro.js"></script>-->	
	</head>
	
	<body>
		<form class="control-group">
			<fieldset>
				<legend>Datos Personales</legend>
				<label class="control-label">Nombre(s):</label>
				<div class="controls">
				<input type="text" id="nombre">
				</div>
				<label class="control-label">Apellido Paterno:</label>
				<div class="controls">
				<input type="text" id="apellidoPat">
				</div>
				<label class="control-label">Apellido Materno:</label>
				<div class="controls">
				<input type="text" id="apellidoMat">
				</div>
				<label class="control-label">Correo Electrónico:</label>
				<div class="controls">
				<input type="text" id="correo">
				</div>
				<label class="control-label">Procedencia:</label>
				<div class="controls">
				<input type="text" id="procedencia">
				</div>
			</fieldset>
			<br>
			<div id="contenedor">
			<fieldset>
			<legend>Inscripción a Talleres</legend>
			<label for="taller">Selecciona un taller</label>
			<select name="taller" id="taller">
			</select>
			</fieldset><br>
			</div>
			<input name="registrar" id="registrar" type="submit" value="Registrar"/>
		</form>
	</body> 
</html>










