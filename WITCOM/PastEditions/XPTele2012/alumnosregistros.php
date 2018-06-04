<?php
include 'myscon.ajs.php';
$qry = mysql_query("SELECT * FROM asistencia");
// ASISTENCIA
echo '<br><br><b>Asistencia: <br>';
echo '<table width="100%" border="1">';
while($row = mysql_fetch_array($qry)){
	echo '<tr>
		<td>'.$row['id'].'</td>
		<td>'.$row['usuario'].'</td>
		<td>'.$row['ponencia'].'</td>
		</tr>';
	}
echo '</table>';

// AUDITORIO
echo '<br><br><b>Auditorio: <br>';
$qry = mysql_query("SELECT * FROM auditorio");
// ASISTENCIA
echo '<table width="100%" border="1">';
while($row = mysql_fetch_array($qry)){
	echo '<tr>
		<td>'.$row['boleta'].'</td>
		<td>'.$row['nombre'].'</td>
		<td>'.$row['apellidos'].'</td>
		<td>'.$row['email'].'</td>
		<td>'.$row['plan'].'</td>
		<td>'.$row['avance'].'</td>
		</tr>';
	}
echo '</table>';
?>