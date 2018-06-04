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
include 'myscon.ajs.php';
$cons = mysql_query("SELECT plan, count(plan) total, avg(avance) avance from auditorio where plan = 'n'") or die(mysql_error());
$row = mysql_fetch_array($cons);

mysql_query("update asistencia set id = (round(rand()*10000)+10000) where id = 0");
if (mysql_query("ALTER TABLE  `asistencia` ADD PRIMARY KEY (  `id` )"))
	$ok = true;
if (mysql_query("ALTER TABLE  `asistencia` CHANGE  `id`  `id` INT( 5 ) NOT NULL AUTO_INCREMENT"))
 $ok2 = true;
include 'mmenu.php';
?>
<br />
<hr /><center>Registrados:</center><hr />
<table border="1" bordercolor="#EEEEEE" cellpadding="3" cellspacing="0" width="100%">
    <tr bgcolor="#CCCCCC">
      <td align="center" width="33%"><p><strong>Plan</strong></p></td>
      <td align="center" width="33%"><p><strong>Registrados</strong></p></td>
      <td align="center" width="34%"><p><strong>Status Promedio</strong></p></td>
      </tr>

     <tr bgcolor="#FAFAFA">
      <td align="center" width="33%"><p><strong>Nuevo Plan</strong></p></td>
      <td align="center" width="33%"><p><strong><? echo $row['total']?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php echo $row['avance']*10; echo '% de avance';?></strong></p></td>
     </tr>
<?php
	  include 'myscon.ajs.php';
$cons = mysql_query("SELECT plan, count(plan) total, avg(avance) avance from auditorio where plan = 'v'") or die(mysql_error());
$row = mysql_fetch_array($cons);
?>
     <tr bgcolor="#FAFAFA">
      <td align="center" width="33%"><p><strong>Viejo Plan</strong></p></td>
      <td align="center" width="33%"><p><strong><? echo $row['total']?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php echo $row['avance']; echo ' semestre';?></strong></p></td>
     </tr>
<?php
	  include 'myscon.ajs.php';
$cons = mysql_query("SELECT plan, count(plan) total from auditorio where plan = 'e'") or die(mysql_error());
$row = mysql_fetch_array($cons);
?>
     <tr bgcolor="#FAFAFA">
      <td align="center" width="33%"><p><strong>Egresados</strong></p></td>
      <td align="center" width="33%"><p><strong><? echo $row['total']?></strong></p></td>
      <td align="center" width="34%"><p><strong> n/a </strong></p></td>
     </tr>
      </table>
<?php
include 'myscon.ajs.php';
$cons = mysql_query("SELECT ponentes.ponencia ponencia, COUNT( asistencia.ponencia ) cantidad
					FROM asistencia, ponentes
					WHERE ponentes.id = asistencia.ponencia
					GROUP BY asistencia.ponencia
					ORDER BY cantidad DESC ") or die(mysql_error());
?>
<br />
<hr /><center>Demanda de Ponencias:</center><hr />
<table border="1" bordercolor="#EEEEEE" cellpadding="3" cellspacing="0" width="100%">
    <tr bgcolor="#CCCCCC">
      <td align="center" width="70%"><p><strong>Ponencia</strong></p></td>
      <td align="center" width="30%"><p><strong>Registrados</strong></p></td>
      </tr>
<?php 
	while($row = mysql_fetch_array($cons)){
		?>
     <tr bgcolor="#FAFAFA">
      <td align="left"><p><strong><? echo $row['ponencia']?></strong></p></td>
      <td align="center"><p><?php echo $row['cantidad'];?></p></td>
     </tr>
<p>
  <?php
	}
	echo '</table><hr />Emails registrados: <hr />';
$cons = mysql_query("SELECT email from auditorio") or die(mysql_error());
$cadena = '';
echo '<textarea style="width: 100%" rows="7">';
while ($qry = mysql_fetch_array($cons)){
	$cadena.=$qry['email'].', ';
	}
echo substr($cadena,0,-2);
echo '</textarea>';
?>
</p><br />
<hr />
Registro de Talleres
<hr />
<table border="1" bordercolor="#EEEEEE" cellpadding="3" cellspacing="0" width="100%">
    <tr bgcolor="#CCCCCC">
      <td align="center" width="33%"><p><strong>Taller</strong></p></td>
      <td align="center" width="33%"><p><strong>Registrados</strong></p></td>
      <td align="center" width="34%"><p><strong>En Espera</strong></p></td>
  </tr>

     <tr bgcolor="#FAFAFA">
       <td><strong>Taller Apps</strong></td>
      <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =21 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =21 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
     <tr bgcolor="#FAFAFA">
       <td><strong>BPEL: End-to-end process flow</strong></td>
      <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =22 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =22 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
     <tr bgcolor="#FAFAFA">
       <td><strong>Taller Lenguajes Funcionales</strong></td>
       <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =23 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =23 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
     <tr bgcolor="#FAFAFA">
       <td><strong>Telefon&iacute;a IP</strong></td>
       <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =24 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =24 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
     <tr bgcolor="#FAFAFA">
       <td><strong>TV Interactiva</strong></td>
      <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =25 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =25 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
          <tr bgcolor="#FAFAFA">
            <td><p><strong>Trabajando con Google Maps y Sql Server 2008</p></td>
       <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =26 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =26 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
          <tr bgcolor="#FAFAFA">
            <td><strong>Evaluacion financiera</strong></td>
       <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =27 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =27 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
          <tr bgcolor="#FAFAFA">
            <td><strong>Aplicaciones Nativas para iOS 5 ( iPhone, iPod,iPad)</strong></td>
       <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =28 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =28 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>


          <tr bgcolor="#FAFAFA">
            <td><strong>Telefonia IP (taller 2 : 13 a 15 hrs)</strong></td>
       <td align="center" width="33%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =29 AND interes =3");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
      <td align="center" width="34%"><p><strong><?php
      	$contall = mysql_query("SELECT COUNT( * ) total FROM asistencia 
WHERE ponencia =29 AND interes =2");
		$contall = mysql_fetch_array($contall);
		echo $contall['total'];
	  ?></strong></p></td>
     </tr>
      </table>
<?
include 'footer.php';
?>