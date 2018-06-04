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
$success = "Courses.html";
$error = "inscription.html";
$cn=mysql_connect($server, $user, $password) or die("Error al concetar al servidor mysql:".mysql_error());
$db=mysql_select_db($database,$cn) or die("Error al conectar a la base de datos:".mysql_error());



$q1=mysql_query("select count(taller) as total from registro where taller='Taller_1';");
$data=mysql_fetch_assoc($q1);
$q11= $data['total'];

$q2=mysql_query("select count(taller) as total from registro where taller='Taller_2';");
$data=mysql_fetch_assoc($q2);
$q22= $data['total'];

$q3=mysql_query("select count(taller) as total from registro where taller='Taller_3';");
$data=mysql_fetch_assoc($q3);
$q33= $data['total'];

$q4=mysql_query("select count(taller) as total from registro where taller='Taller_4';");
$data=mysql_fetch_assoc($q4);
$q44= $data['total'];

$q5=mysql_query("select count(taller) as total from registro where taller='Taller_5';");
$data=mysql_fetch_assoc($q5);
$q55= $data['total'];

$q6=mysql_query("select count(taller) as total from registro where taller='Taller_6';");
$data=mysql_fetch_assoc($q6);
$q66= $data['total'];

$q7=mysql_query("select count(taller) as total from registro where taller='Taller_7';");
$data=mysql_fetch_assoc($q7);
$q77=$data['total'];


$q8=mysql_query("select count(taller) as total from registro where taller='Taller_8';");
$data=mysql_fetch_assoc($q8);
$q88= $data['total'];

$nom=mysql_query("SELECT MAX(id_usuario) as total FROM registro_taller.registro;");
$data=mysql_fetch_assoc($nom);
$no=$data['total'];
$n=$no;
$nomb=mysql("Select nombre as total from registro where id_usuario='$n';");
$data=mysql_fetch_assoc($nomb);
$nombrar=$data['total'];


$ta1=mysql_query("select * as total from registro where taller='Taller_1';");
$data=mysql_fetch_assoc($ta1);
$taller_1= $data['total'];


mysql_close($conect);


?>


</body>

</html>
