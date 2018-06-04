<?php
if($_SESSION['admin'] == 'migf'){
	echo '<br /><hr />
<center>
<a href="admin.php">Horarios</a> | 
<a href="reporter.php">Ir a Reportes</a> | 
<a href="v_registros.php" target="_blank">Listado General</a> | 
<a href="listadoponentes.php" target="_blank">Enviar a Ponentes</a> | 

</center>
<hr /><br /><br />';
}
else{
	
	die();
	}
?>