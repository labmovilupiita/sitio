
<?php

//-------------------------Conexión a la base de datos--------------------------------------
include_once('globals.php');
$conn = new mysqli(config::getBBDDServer(),config::getBBDDUser(),config::getBBDDPwd(),config::getBBDDName());
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//-----------------------------------------------------------------------------------------


//Obtención de los valores POST desde la app de android
$code = $_POST["code"];
$tipo = $_POST["tipo"];

if($tipo==1)
	checkin($conn,$code);
else
	checkout($conn,$code);



/*****************************FUNCIÓN PARA CHECKOUT********************************************/
function checkout($conn,$code){
	//Bandera para cerrar conexión en caso de error
	$i=0;
	//Se checa si existe un registro de checkin previó y está completo con checkout
	$sql = "SELECT * FROM checkin WHERE code=$code";
	if ($result=$conn->query($sql)) {
		if($result->num_rows == 0){
			echo "Debes hacer CHECKIN primero";
			$conn->close();
			exit;
		}
		
		while($row = mysqli_fetch_array($result)) {
			$id=$row['id'];
			$hora_salida = $row['hora_salida'];		
			if($hora_salida == null)
			{
				$sql = "UPDATE checkin SET hora_salida=NOW() WHERE code=$code AND id=$id";
				if ($conn->query($sql) === TRUE) {
					echo "CHECKOUT Registrado";
				} else {
					echo "Error, datos de QR no válidos";
				}
				$conn->close();		
				exit;							
			}	
			
		}
		echo "Debes hacer CHECKIN primero";
		$conn->close();
	}else {
		echo "Error, datos de QR no válidos";
	}	
}
/*****************************TERMINA FUNCIÓN PARA CHECKOUT********************************************/





/*****************************FUNCIÓN PARA CHECKIN********************************************/
function checkin($conn,$code){
	//Bandera para cerrar conexión en caso de error
	$i=0;
	//Se checa si existe un registro de checkin previó y está completo con checkout
	$sql = "SELECT * FROM checkin WHERE code=$code";
	if ($result=$conn->query($sql)) {
		//Si es la primera vez que se crea el registro 
		if($result->num_rows == 0){
			$sql = "INSERT INTO checkin (code, hora_entrada,fecha)
			VALUES ($code, NOW(),NOW())";
			if ($conn->query($sql) === TRUE) {
				echo "CHECKIN hecho correctamente :)";
			} else {
				echo "Error, datos de QR no válidos";
			}
			$conn->close();		
			exit;
		}
		
		//Se detectan todas las tuplas del code y se checa si checkout está completo
		while($row = mysqli_fetch_array($result)) {
			$hora_salida = $row['hora_salida'];		
			if($hora_salida == null)
			{
				$i=1;
				break;			
			}		
		}
		//Si no hay hora de salida y quiere hacer otro checkin no puede y marca advertencia
		if($i==1){
			echo "No marcaste CHECKOUT, primero hazlo para poder entrar";
			$conn->close();
			exit;
		}else{
			$sql = "INSERT INTO checkin (code, hora_entrada,fecha)
			VALUES ($code, NOW(),NOW())";
			if ($conn->query($sql) === TRUE) {
				echo "CHECKIN hecho correctamente :)";
			} else {
				echo "Error, datos de QR no válidos";
			}
			$conn->close();		
		}	
	} else {
		echo "Error, datos de QR no válidos";
	}	
}
/*****************************TERMINA FUNCIÓN PARA CHECKIN********************************************/

?> 