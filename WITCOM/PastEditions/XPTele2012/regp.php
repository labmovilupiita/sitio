<?php
$titulo = "Registro Ponentes";
include 'header.php';
if(isset($_POST['enviar'])){
	include 'myscon.ajs.php';
	mysql_query("INSERT INTO ponentes (id, nombre, empresa, ponencia, clave, resumen) VALUES
	('', '$_POST[nombre]', '$_POST[empresa]', '$_POST[ponencia]', '$_POST[clave]',  '$_POST[resumen]')") or die('<br><br><br>No se han podido ingresar tus datos, por favor inténtalo de nuevo. <br><br><br><br><br><a href="regp.php">Regresar</a>');
	echo "<br><br><br><br><br>Agradecemos la información proporcionada.<br><br><strong>Laboratorio de Cómputo Móvil</strong>";
	}
else{
?>
<form method="post" action="regp.php" >

<table width="90%">
<tr>
	<td width="30%">Nombre</td>
	<td><input type="text" name="nombre" size="40" autofocus required/></td>
</tr>
<tr>
	<td width="30%">Empresa</td>
	<td><input type="text" name="empresa" size="40"  required/></td>
</tr>
<tr>
	<td width="30%">Taller o Ponencia</td>
	<td><input type="text" name="ponencia" size="40"  required/></td>
</tr>
<tr>
	<td width="30%">Palabras clave</td>
	<td><input type="text" name="clave" size="40"  required/></td>
</tr>

<tr>
	<td width="30%">Resumen Ponencia</td>
	<td><textarea name="resumen" rows="12" cols="40"></textarea></td>
</tr>
</table>
<br /><br />
<center>
<input type="submit" name="enviar" value="Enviar" />
</center></form>
<?php
}
include 'sidebar.php';
include 'footer.php';
?>