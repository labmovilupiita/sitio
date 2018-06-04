<?php
	include 'myscon.ajs.php';	
	mysql_query("delete from auditorio where boleta = 91030302 OR boleta = 94070005");
	echo 'Todo ok';
?>