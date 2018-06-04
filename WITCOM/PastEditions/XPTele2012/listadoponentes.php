<?php
session_start();
// migfelxpt
$titulo = "Reportes";
include 'header.php';
if($_SESSION['admin'] != 'migf'){
	echo '<br /><br />
		<hr />
		<center><a href="admin.php">¿Iniciar sesión?</a></center>
		<hr /><br /><br />';
		include 'footer.php';
		die();
}
include 'mmenu.php';
include 'myscon.ajs.php';
if (isset($_POST['Enviar'])){
	$id = $_POST['ponente'];
	if($id > 20)
	$cons = mysql_query("Select distinct boleta, nombre, apellidos, email, plan, avance
from asistencia, auditorio
where asistencia.usuario = auditorio.boleta
AND ponencia = $id
AND interes = 3
ORDER BY plan, avance") or die(mysql_error());
else 
$cons = mysql_query("Select distinct boleta, nombre, apellidos, email, plan, avance
from asistencia, auditorio
where asistencia.usuario = auditorio.boleta
AND ponencia = $id
ORDER BY plan, avance") or die(mysql_error());
$cadena = '';
?>
<table width="100%" border="0" cellspacing="3" cellpadding="0">
             <tr bgcolor="#CCCCCC">
	             <td WIDTH="3%" align="center"><strong>ID</strong></td>
                 <td WIDTH="40%" align="center"><strong>Nombre</strong></td>
                 <td align="center"><strong>Plan</strong></td>
                 <td align="center"><strong>Avance</strong></td>
               </tr>
<?php
$i =1;
while($row = mysql_fetch_array($cons)){
	echo '<tr bgcolor="#FAFAFA">
	<td align="center">'.$i.'</td>
	<td>'.$row['nombre'].' '.$row['apellidos'].'</td>
	<td>';
	if($row['plan'] == 'N') echo 'Plan 2009';
	else if($row['plan'] == 'V') echo 'Plan 1998';
	else echo 'Egresado';
	echo '</td>
	<td align="center">'.$row['avance'].'</td>
	</tr>';
	$cadena.=$row['email'].', ';
	$i++;
	}
echo '</table><br><hr>Correos: <hr><br>';

echo '<textarea style="width: 100%" rows="7">';
echo substr($cadena,0,-2);
echo '</textarea><br><hr>En Espera<hr><br>';
	$cons = mysql_query("Select distinct boleta, nombre, apellidos, email, plan, avance
from asistencia, auditorio
where asistencia.usuario = auditorio.boleta
AND ponencia = $id
AND interes = 2
ORDER BY plan, avance desc") or die(mysql_error());
$cadena = '';
?>
<table width="100%" border="0" cellspacing="3" cellpadding="0">
             <tr bgcolor="#CCCCCC">
	             <td WIDTH="3%" align="center"><strong>ID</strong></td>
                 <td WIDTH="40%" align="center"><strong>Nombre</strong></td>
                 <td align="center"><strong>Plan</strong></td>
                 <td align="center"><strong>Avance</strong></td>
                 <td align="center"><strong>Estatus</strong></td>
               </tr>
<?php
$i =1;
while($row = mysql_fetch_array($cons)){
	echo '<tr bgcolor="#FAFAFA">
	<td align="center">'.$i.'</td>
	<td>'.$row['nombre'].' '.$row['apellidos'].'</td>
	<td>';
	if($row['plan'] == 'N') echo 'Plan 2009';
	else if($row['plan'] == 'V') echo 'Plan 1998';
	else echo 'Egresado';
	echo '</td>
	<td align="center">'.$row['avance'].'</td><td>';
	$stat = mysql_query("Select ponencia from asistencia
			where usuario = $row[boleta]
			AND interes = 3 order by ponencia asc") or die(mysql_error());
	if(mysql_num_rows($stat) == 0)
		echo "Solo espera apertura de curso";
	else{
		$stats = mysql_fetch_array($stat);
		//if($stats['ponencia'] == 21) 
		echo "<b>inscrito a la ponencia ".$stats['ponencia']."</b>";
		}
echo	'</td></tr>';
	$cadena.=$row['email'].', ';
	$i++;
	}
echo '</table><br><hr>Correos: <hr><br>';

echo '<textarea style="width: 100%" rows="7">';
echo substr($cadena,0,-2);
echo '</textarea>';
	}
else{

$cons = mysql_query("SELECT plan, count(plan) total, avg(avance) avance from auditorio where plan = 'n'") or die(mysql_error());
$row = mysql_fetch_array($cons);


include 'myscon.ajs.php';
$cons = mysql_query("SELECT id, ponencia from ponentes where id < 12") or die(mysql_error());
?>

<hr /><center>Consultar Ponente<hr />
<form action="listadoponentes.php" method="post">
<select name="ponente">
<?php 
	while($row = mysql_fetch_array($cons)){
		?>
     <option value="<? echo $row['id']?>"><? echo $row['ponencia']?></option>
  <?php
	}
?>
<option value="21">Taller Apps</option>
<option value="22">BPEL: End-to-end process flow</option>
<option value="23">Taller Lenguajes Funcionales</option>
<option value="24">Telefonía IP</option>
<option value="25">TV Interactiva</option>
<option value="26">Trabajando con Google Maps y Sql Server 2008</option>
<option value="27">Evaluacion financiera</option>
<option value="28">Aplicaciones Nativas para iOS 5</option>
<option value="29">Telefonia IP (taller 2)</option>
</select>
<br />
<input type="submit" name="Enviar" value="Enviar" />
</form></center>
<?php }
include 'footer.php';
?>