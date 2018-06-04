<?php
	$limite =30;
	echo 'Emails actualizados:<br>';
	include 'myscon.ajs.php';	
	$sel = mysql_query("SELECT * 
						FROM asistencia
						WHERE ponencia >20
						ORDER BY id");
	while($usuar = mysql_fetch_array($sel)){
		include 'myscon.ajs.php';	
		$cup = mysql_query("SELECT id, usuario, ponencia, interes
					FROM asistencia
					WHERE ponencia >20
					AND usuario = $usuar[usuario]
					ORDER BY interes DESC 
					LIMIT 0 , 1");
		$max = mysql_fetch_array($cup);
		if($max['interes'] != 3){
				include 'myscon.ajs.php';	
				$cupo = mysql_query("SELECT COUNT( * ) total
								FROM asistencia
								WHERE ponencia =23
								AND interes =3");
				$cupo = mysql_fetch_array($cupo);
				if($cupo['total'] <= $limite){
				mysql_query("UPDATE asistencia SET interes = 3 WHERE id = $max[id]") or 					die('mane'.mysql_error());
			$cup2= mysql_query("SELECT email 
					FROM asistencia, auditorio
					WHERE asistencia.usuario = auditorio.boleta
					AND id = $max[id]");
			$max2 = mysql_fetch_array($cup2);	
			echo $max2['email'].', ';
				}
			}
	
	}
echo '<br><br><br>Registros Corregidos';
?>