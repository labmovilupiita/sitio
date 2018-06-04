<?php
session_start();
$titulo = "Ponentes";
include 'header.php';
include 'myscon.ajs.php';
if(isset($_SESSION['ingreso']) && $_SESSION['ingreso'] == "LOGGED"){
	if(isset($_POST['modif'])){
		mysql_query("UPDATE ponentes SET
		nombre = '$_POST[nombre]', empresa = '$_POST[empresa]', ponencia = '$_POST[ponencia]',
		 clave = '$_POST[clave]', perfil = '$_POST[perfil]', resumen = '$_POST[resumen]' where id = $_SESSION[id]");
		 echo "<center>Actualizado</center>";
		}
	include 'infoponente.php';
	}
elseif (isset($_POST['mail'])){
	$correoe = $_POST['mail'];
	$ctrs = $_POST['pass'];
	$cons = mysql_query("SELECT id from ponentes where email = '$correoe' and pass = '$ctrs'");
	if (mysql_num_rows($cons) != 1){
		echo '<h2>La información es incorrecta</h2><br> <INPUT type="button" value="Regresar al Formulario" onClick="history.back()">';
		die();
		}
	$row = mysql_fetch_array($cons);	
	$_SESSION['ingreso'] = "LOGGED";
	$_SESSION['id'] = $row['id'];
	include 'infoponente.php';
		}
else{
	echo '<h2>No has iniciado sesión</h2>';
	include 'footer.php';
	die();

}

include 'footer.php';
?>