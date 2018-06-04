<?php
session_start();
$titulo = "Ponencia";
include 'header.php';
$pin = $_GET['id'];
include 'myscon.ajs.php';
$cons = mysql_query("SELECT * from ponentes where id = $pin");
$row = mysql_fetch_array($cons);
?>
<br />
<hr />
<?php
if (isset($_SESSION['user'])){
	$boleta = $_SESSION['user'];
	if (isset($_POST['asistir'])){
		mysql_query("INSERT INTO asistencia (id, usuario, ponencia) VALUES ('', $boleta, $pin)");
	}
	
	$regs = mysql_query("SELECT id from asistencia where usuario = $boleta AND ponencia = $pin");
	if(mysql_num_rows($regs) > 0) {
		echo '<img src="images/ok.jpg" style="float: right" />';
	}
	else {
		?>
        <form action="ponente.php?id=<? echo $pin;?>" method="post">
        <input type="image" src="images/asistir.jpg" name="asistir" value="asistir" style="float: right" onclick="confirm('¿Deseas registrar tu asistencia a esta ponencia?')" />
</form>
		<?php
	}
}
else {
?>
<a href="registro.php"><img src="images/asistir.jpg" style="float: right" /></a>
<? } ?>
<h3><? echo $row{'nombre'}; ?></h3>

<hr />

<p><strong>Ponencia:</strong> <? echo $row{'ponencia'}; ?></p>
<p><strong>Empresa: </strong><? echo $row{'empresa'}; ?> </p>
<p><strong>Palabras clave: </strong><? echo $row{'clave'}; ?></p>
<h3>Resumen:</h3>
<p align="justify" style="padding-right:40px"><? echo $row{'resumen'}; ?></p>
<br /><center><a href="ponentes.php">Volver</a></center>
<?php
include 'footer.php';
?>