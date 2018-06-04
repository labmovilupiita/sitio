<?php
	$limite =30;
	include 'myscon.ajs.php';	
	
	mysql_query("ALTER TABLE `auditorio` ADD PRIMARY KEY(`boleta`)");

	// Eliminar duplicados por email
	mysql_query("CREATE TABLE auditorio_temp AS SELECT * FROM auditorio GROUP BY (email)");
	mysql_query("DROP TABLE auditorio");
	mysql_query("RENAME TABLE auditorio_temp TO auditorio");
	echo '<br>... eliminando registros duplicados por email';
	
	
	mysql_query("DELETE from asistencia where usuario = 91030302");
	
	// Eliminar duplicados por boleta
	mysql_query("CREATE TABLE auditorio_tembp AS SELECT * FROM auditorio GROUP BY (boleta)");
	mysql_query("DROP TABLE auditorio");
	mysql_query("RENAME TABLE auditorio_tembp TO auditorio");
	echo '<br>... eliminando registros duplicados por boleta';
//	die();

	// Reorganizando inscripciones
	mysql_query("DELETE from asistencia where interes = 1");
	for($i = 21; $i < 29; $i++){
		$conteo = mysql_query("SELECT COUNT( * ) total, ponencia 
								FROM asistencia
								WHERE interes = 3 AND ponencia = $i");
		$act = mysql_fetch_array($conteo);
		if($act['total'] < 30){
			$lim = $limite - $act['total'];
			$cadena = '';
//			echo '<br>para '.$i.' hay '.$act['total'].' y faltan: '.$lim.' para los '.$limite;
			$ins = mysql_query("select id from asistencia where ponencia = $i AND interes = 2 LIMIT 0,$lim");
			if(mysql_num_rows($ins) > 0) {
				while($borrar = mysql_fetch_array($ins)){
					$cadena.=$borrar['id'].', ';
					}
				$cadena= substr($cadena,0,-2);
				$cad1="update asistencia set interes = 3 where id IN ($cadena)";
//				echo '<br>'.$cad1;
				mysql_query($cad1);
			}
		}
	
	mysql_query("CREATE TABLE auditorio_tembp AS SELECT * FROM asistencia GROUP BY usuario, ponencia");
	mysql_query("DROP TABLE asistencia");
	mysql_query("RENAME TABLE auditorio_tembp TO asistencia");
	echo '<br>... eliminando registros duplicados por boleta';
	
	}

mysql_query("update asistencia set id = (round(rand()*10000)+10000) where id = 0");
if (mysql_query("ALTER TABLE  `asistencia` ADD PRIMARY KEY (  `id` )"))
	$ok = true;
if (mysql_query("ALTER TABLE  `asistencia` CHANGE  `id`  `id` INT( 5 ) NOT NULL AUTO_INCREMENT"))
 $ok2 = true;
 if (mysql_query("ALTER TABLE  `asistencia` ADD PRIMARY KEY (  `id` )"))
	$ok = true;
if (mysql_query("ALTER TABLE  `asistencia` CHANGE  `id`  `id` INT( 5 ) NOT NULL AUTO_INCREMENT"))
 $ok2 = true;
 
 if (mysql_query("ALTER TABLE  `auditorio` ADD PRIMARY KEY (  `boleta` )"))
	$ok = true;
if (mysql_query("ALTER TABLE  `auditorio` CHANGE  `boleta`  `boleta` NOT NULL AUTO_INCREMENT"))
 $ok2 = true;
echo '<br><br><br>Registros Corregidos';
?>