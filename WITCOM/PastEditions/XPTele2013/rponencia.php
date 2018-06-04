<?php
session_start();
session_destroy();
$titulo = "Área de Ponentes";
include 'header.php';
// ponente2012
echo '<center>';
if(isset($_POST['registrar'])){
	function lcadena($cadena){
		$cadena2 = preg_replace ("[^._A-Za-z0-9]", "", $cadena);
		return $cadena2;
		}
	if ($_POST['pass'] != $_POST['passv']){
		echo '<h2>Las contraseñas no coinciden</h2><br> <INPUT type="button" value="Regresar al Formulario" onClick="history.back()">';
		die();
		}
	else{
		$nombre = lcadena($_POST['nombre']);
		$email = lcadena($_POST['email']);
		if($nombre == '' || $email == '' || $_POST['pass'] == ''){
		echo '<h2>Deben ser llenados todos los campos</h2><br> <INPUT type="button" value="Regresar al Formulario" onClick="history.back()">';
		die();
			}
		include 'myscon.ajs.php';
		$text = "UPDATE ponentes SET nombre = '$nombre', email = '$email', pass = '$_POST[pass]' WHERE id =  '$_POST[ponencia]'";
		mysql_query($text) or die(mysql_error());
		$_SESSION['ingreso'] = "LOGGED";
		echo '<h2>Registro Exitoso</h2><br>';
		include 'session.php';
	}
	}
else if(isset($_POST['Enviar']) && md5($_POST['codpon']) == "49ba2bfb407a535762ffd9748a69846f"){
?>
<form name="ponencia" method="post" action="rponencia.php" autocomplete="off">
<h2>Ingresar los datos de registro de usuario</h2><br />
<table width="80%" border="0">
<tr>
<td width="40%"><strong>Nombre</strong></td>
<td><input type="text" name="nombre" style="width: 200px"/></td>
</tr>
<table width="80%" border="0">
<tr>
<td width="40%"><strong>Ponencia</strong></td>
<td><select name="ponencia" style="width: 200px">
<?php
include 'myscon.ajs.php';
$cons = mysql_query("SELECT id, ponencia from ponentes WHERE pass IS NULL ORDER BY id") or die(mysql_error());
while($row = mysql_fetch_array($cons)){
	echo '<option value="'.$row['id'].'">'.$row['ponencia'].'</option>';
	}
?>

</select></td>
</tr>
<tr>
<td><strong>Correo Electrónico</strong></td>
<td><input type="text" name="email" style="width: 200px"/>
</td>
</tr>
<tr>
<td><strong>Contraseña</strong></td>
<td><input type="password" name="pass" style="width: 200px"/></td>
</tr>
<tr>
<td><strong>Verificar Contraseña</strong></td>
<td><input type="password" name="passv" style="width: 200px"/></td>
</tr>
<tr><td></td><td>
<input type="submit" value="Registrar" name="registrar" /></td></tr></table>
<br /><br />
<?php
	}
else{
?>
<h2>Código de Registro</h2>
<form name="ponencia" method="post" action="rponencia.php" autocomplete="off">
<input type="text" name="codpon" />
<input type="submit" value="Enviar" name="Enviar" />
</form>
<br />
<br /><br />ó<br /><br />
<?php
		include 'session.php';
		echo '</center>';
}
include 'footer.php';
?>