<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Titulo</title>
<style>
body{
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;
	margin: 0;
	text-align: center;
	}
a{
	font-weight:bold;
	color: #FF7711;
	text-decoration:none;
	}
thead{
	background-color: #DDDDDD;
	}
a:hover{
	font-weight:bold;
	text-decoration:none;
	color:#CCCCCC;}
</style>
</head><body>
	<?php

// AUDITORIO
echo '<br><br><b>Auditorio: <br>';
include 'myscon.ajs.php';
$i = 1;
$compliment = "SELECT * FROM auditorio";
if(isset($_GET['order'])) {
		$compliment.= ' ORDER BY '.$_GET['type'];
		if($_GET['order'])	$compliment.=" desc";
}
$qry = mysql_query($compliment);
// ASISTENCIA
if(!isset($_GET['order'])) $order = 1;
else $order = $_GET['order'];
$order = abs(abs($order)-1);
if ($order) $mark = '&lt;';
else $mark = '&gt;';
echo '<table width="100%" border="1">';
echo '<thead><tr>
<td>id</td>
		<td><a href="v_registros.php?type=boleta&order='.$order.'">Boleta '.$mark.'</a></td>
		<td><a href="v_registros.php?type=nombre&order='.$order.'">Nombre '.$mark.'</a></td>
		<td><a href="v_registros.php?type=apellidos&order='.$order.'">Apellidos '.$mark.'</a></td>
		<td><a href="v_registros.php?type=email&order='.$order.'">Email '.$mark.'</a></td>
		<td><a href="v_registros.php?type=plan&order='.$order.'">Plan '.$mark.'</a></td>
		<td><a href="v_registros.php?type=avance&order='.$order.'">Avance '.$mark.'</a></td>
</tr></thead>';
while($row = mysql_fetch_array($qry)){
	echo '<tr>
		<td>'.$i.'</td>
		<td>'.$row['boleta'].'</td>
		<td>'.$row['nombre'].'</td>
		<td>'.$row['apellidos'].'</td>
		<td>'.$row['email'].'</td>
		<td>';
		if($row['plan'] == 'e') echo 'Egresado';
		else if($row['plan'] == 'n') echo 'Nuevo';
		else if($row['plan'] == 'v') echo 'Viejo';
		else echo $row['plan'];
		echo '</td>
		<td>'.$row['avance'].'</td>
		</tr>';
		$i++;
	}
echo '</table>';

// ASISTENCIA
include 'myscon.ajs.php';
$qry = mysql_query("SELECT * FROM asistencia");
echo '<br><br><b>Asistencia: <br>';
echo '<table width="100%" border="1">';
while($row = mysql_fetch_array($qry)){
	echo '<tr>
		<td>'.$row['id'].'</td>
		<td>'.$row['usuario'].'</td>
		<td>'.$row['ponencia'].'</td>
		<td>'.$row['interes'].'</td>
		</tr>';
	}
echo '</table>';
?>
</body></html>