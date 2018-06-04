<?php
	function Conectarse(){
		if(!($link=mysqli_connect("localhost","admin"))){
			echo "Error conectando a la base de datos.";
			exit();
		}
		if(!mysqli_select_db($link,"ttBD")){
			echo "Error seleccionando la base de datos.";
			exit();
		}
		return $link;
	}

	function Cerrar($con){
		mysqli_close($con);
	}
?>