<?php
	$limite =30;
	include 'myscon.ajs.php';	
	
	// Eliminar duplicados por email
	mysql_query("CREATE TABLE auditorio_temp AS SELECT * FROM auditorio GROUP BY (email)");
	mysql_query("DROP TABLE auditorio");
	mysql_query("RENAME TABLE auditorio_temp TO auditorio");
	mysql_query("DELETE from auditorio where boleta < 3000000");
	echo '<br>... eliminando registros duplicados por email';
	
	// desinscribiento egresados
	$cons = mysql_query("Select boleta from auditorio where plan = 'e'");
	$cadena = '';
	while($borrar = mysql_fetch_array($cons)){
		$cadena.=$borrar['boleta'].', ';
		}
	$cadena= substr($cadena,0,-2);
	mysql_query("UPDATE asistencia set interes = 2 where usuario IN ($cadena)");
	echo '<br>... desinscribiendo egresados';

	// inscripciones duplicadas
	mysql_query("CREATE TABLE asistencia_temp AS SELECT * FROM asistencia GROUP BY usuario, interes, ponencia");
	mysql_query("DROP TABLE asistencia");
	mysql_query("RENAME TABLE asistencia_temp TO asistencia");
	mysql_query("DELETE from asistencia where usuario < 3000000");
	echo '<br>... eliminando inscripciones duplicadas por interes';
	
	// inscripciones duplicadas
	mysql_query("CREATE TABLE asistencia_temp AS SELECT * FROM asistencia GROUP BY usuario, ponencia");
	mysql_query("DROP TABLE asistencia");
	mysql_query("RENAME TABLE asistencia_temp TO asistencia");
	mysql_query("DELETE from asistencia where usuario < 3000000");
	echo '<br>... eliminando inscripciones duplicadas por ponencia';

	// Reorganizando inscripciones
	$limite = 30;
	$conteo = mysql_query("SELECT COUNT( * ) total, ponencia 
							FROM asistencia
							WHERE ponencia >20
							AND interes =3
							GROUP BY ponencia");
	while($act = mysql_fetch_array($conteo)){
		$i = $limite - $act['ponencia'];
//		echo $i;
		$cons = mysql_query("SELECT distinct id, boleta, ponencia from asistencia, auditorio where usuario = boleta and interes = 2 AND plan != 'e' limit 0,$i");
		$cadena = '';
		while($borrar = mysql_fetch_array($cons)){
			$cadena.=$borrar['id'].', ';
			}
		$cadena= substr($cadena,0,-2);
		mysql_query("update asistencia set interes = 3 where id IN ($cadena)");
	}
		// Atendiendo taller apps
	$cons = mysql_query("SELECT * from asistencia where ponencia = 21 AND interes = 3 order by id limit 29,1");
	$apps = mysql_fetch_array($cons);
	mysql_query("update asistencia set interes = 2 where ponencia = 21 AND id > $apps[id]");
	echo '<br>... atendido taller apps';
	
		// Atendiendo taller apps
	$cons = mysql_query("SELECT * from asistencia where ponencia = 22 AND interes = 3 order by id limit 29,1");
	$apps = mysql_fetch_array($cons);
	mysql_query("update asistencia set interes = 2 where ponencia = 22 AND id > $apps[id]");
	echo '<br>... atendido taller 2';
	
		// Atendiendo taller apps
	$cons = mysql_query("SELECT * from asistencia where ponencia = 23 AND interes = 3 order by id limit 29,1");
	$apps = mysql_fetch_array($cons);
	mysql_query("update asistencia set interes = 2 where ponencia = 23 AND id > $apps[id]");
	echo '<br>... atendido taller 3';
	
		// Atendiendo taller apps
	$cons = mysql_query("SELECT * from asistencia where ponencia = 24 AND interes = 3 order by id limit 29,1");
	$apps = mysql_fetch_array($cons);
	mysql_query("update asistencia set interes = 2 where ponencia = 24 AND id > $apps[id]");
	echo '<br>... atendido taller 4';
	
		// Atendiendo taller apps
	$cons = mysql_query("SELECT * from asistencia where ponencia = 25 AND interes = 3 order by id limit 29,1");
	$apps = mysql_fetch_array($cons);
	mysql_query("update asistencia set interes = 2 where ponencia = 25 AND id > $apps[id]");
	echo '<br>... atendido taller 5';
	
	//Eliminando esperas en cursos
	$cons = mysql_query("Select id from asistencia where usuario IN (Select usuario from asistencia WHERE ponencia > 20 AND interes = 3) and interes < 3 OR interes IS NULL and ponencia > 20");
	$cadena = '';
	while($borrar = mysql_fetch_array($cons)){
		$cadena.=$borrar['id'].', ';
		}
	$cadena= substr($cadena,0,-2);
	mysql_query("DELETE from asistencia where id IN ($cadena)");
	echo '<br>... eliminando en espera de algun curso';
	
		// inscripciones duplicadas
	mysql_query("CREATE TABLE asistencia_temp AS SELECT * FROM asistencia GROUP BY usuario, ponencia");
	mysql_query("DROP TABLE asistencia");
	mysql_query("RENAME TABLE asistencia_temp TO asistencia");
	mysql_query("DELETE from asistencia where usuario < 3000000");
	echo '<br>... eliminando inscripciones duplicadas por ponencia';
echo '<br><br><br>Registros Corregidos';
?>