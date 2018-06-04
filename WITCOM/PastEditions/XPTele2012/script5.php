<?php
	$limite =30;
	include 'myscon.ajs.php';	
	
	// Reorganizando inscripciones
		$ins = mysql_query("SELECT id, ponencia 
								FROM asistencia
								WHERE interes = 2 AND ponencia = 24 limit 0,4");
		$cadena = '';
		while($borrar = mysql_fetch_array($ins)){
				$cadena.=$borrar['id'].', ';
				}
		$cadena= substr($cadena,0,-2);
		$cad1="update asistencia set interes = 3 where id IN ($cadena)";
//		echo $cad1;
		mysql_query($cad1);
		mysql_query("UPDATE asistencia set interes = 3, ponencia = 29 where 		 ponencia = 24 AND interes = 2");
		echo '<br><br><br>Registros Corregidos';
?>