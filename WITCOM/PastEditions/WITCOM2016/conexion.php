 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>MySql y PHP</title>
</head>
<body>
<?php
$server="localhost";
$user="witcom";
$password="labmovil";
$database="registro_taller";
$success = "inscrito.php";
$error = "inscription.html";
$error2 = "error.html";

$cn=mysql_connect($server, $user, $password) or die("Error al concetar al servidor mysql:".mysql_error());
$db=mysql_select_db($database,$cn) or die("Error al conectar a la base de datos:".mysql_error());
if($db)
echo "Conexión satisfactoria";
else
echo "No conecto a la Base de Datos";


$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$procedencia = $_POST['procedencia'];
$taller = $_POST['taller'];
$correo = $_POST['correo'];

echo "$apellido";
echo "$nombre";
echo "$genero";
echo "$procedencia";
echo "$taller";
echo "";
$q1=mysql_query("select count(taller) as total from registro where taller='$taller';");
$data=mysql_fetch_assoc($q1);
$q11= $data['total'];

if($q11<26){

$queryStr="INSERT INTO registro (`nombre`,`apellido`,`genero`,`procedencia`,`taller`,`correo`) VALUES ('$nombre','$apellido','$genero','$procedencia','$taller','$correo')";

if(mysql_query($queryStr)){
	header("Location: $success");
}
else{
	header("Location: $error");
}}
else{

	header("Location: $error2");


}

mysql_close($conect);


?>


</body>

</html>
