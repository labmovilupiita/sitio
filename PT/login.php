<?php include("database.php")?>
<?php
	header ('Content-type: text/html; charset=utf-8');
	// Inicializa la sesion
	session_start();

	$correo = $_POST['user'];
	$password = $_POST['pass'];

	$con = Conectarse();
	$query = "SELECT * FROM profesor WHERE correo ='".$correo."'AND password ='".$password."'";
	$q = mysqli_query($con, $query);

	try{

		if($q->data_seek(0)){
			// Activa la variable de sesion con el nombre del usuario activo
			$row = mysqli_fetch_array($q);

			$_SESSION['usuario'] = $row['id'];
			setcookie("userid", $row['id'], 0);
			setcookie("usernombre", $row['nombre']." ".$row['apellidopaterno']." ".$row['apellidomaterno'], 0);
			setcookie("usercorreo", $row['correo'], 0);
			setcookie("usertipo", "0", 0);

			// Redirige a indexlog
			header('Location: Profesor/indexlog.php');
		}else{
			$query = "SELECT * FROM alumno WHERE correo ='".$correo."'AND password ='".$password."'";
			$q = mysqli_query($con, $query);

			if($q->data_seek(0)){
				// Activa la variable de sesion con el nombre del usuario activo
				$row = mysqli_fetch_array($q);

				$_SESSION['usuario'] = $row['id'];
				setcookie("userid", $row['id'], 0);
				setcookie("usernombre", $row['nombre']." ".$row['apellidopaterno']." ".$row['apellidomaterno'], 0);
				setcookie("usercorreo", $row['correo'], 0);
				setcookie("usertipo", "1", 0);

				// Redirige a indexlog
				header('Location: Alumno/indexlog.php');
			}else{
				$query = "SELECT * FROM administrador WHERE correo ='".$correo."'AND password ='".$password."'";
				$q = mysqli_query($con, $query);

				if($q->data_seek(0)){
				// Activa la variable de sesion con el nombre del usuario activo
					$row = mysqli_fetch_array($q);

					$_SESSION['usuario'] = $row['id'];
					setcookie("userid", $row['id'], 0);
					setcookie("usercorreo", $row['correo'], 0);
					setcookie("usertipo", "2", 0);

					// Redirige a indexlog
					header('Location: Administrador/indexlog.php');
				}else{
					// Redirige con error
					header('Location: indexsign.php?loginfail=1');
				}
			}

		}
	}
	catch(Exception $error){

	}
	Cerrar($con);
?>