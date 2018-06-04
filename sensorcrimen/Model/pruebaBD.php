<?php

include_once './Conexion.php';

	echo "Hola Mundo \n";
	$conexion = new Conexion();
	echo "Listo objeto para conectar \n";
	echo "conectando ... \n";
	$con = $conexion->conectar();

	if ($con != NULL) {
        
		echo "Conexion exitosa :) \n";
        echo "ejecutara la consulta \n";
        $query = $con->prepare("SELECT * FROM ubicacion where idubicacion=1 and ubicado=1");
       	
        $query->execute();
        $con = NULL;
        if ($query->rowCount()) {
            $row = $query->fetch();
            echo $row[0]."\n";
            echo $row[2]."\n";
            echo $row[3]."\n";
            echo $row[4]."\n";
            echo $row[5]."\n";
        }
    }else{
    	echo "No se logro la conexion :( \n";
    }

	$conn = Null;