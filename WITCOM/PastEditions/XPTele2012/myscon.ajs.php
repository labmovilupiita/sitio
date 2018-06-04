<?php
		// Cambiar
		// Modificar los siguientes valores: "sitio", "user", "password"
		$conn = mysql_connect("localhost","labcomputo_BD","l4bc0mput0BD") 
        or die ("No se puede establecer la conexión a la base de datos");
		// Nombre de la base de datos
        mysql_select_db("labcomputo_BD") 
        or die("No se tiene acceso a la base de datos");
		
?>