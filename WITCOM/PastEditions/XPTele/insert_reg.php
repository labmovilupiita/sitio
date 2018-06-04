<?php
$titulo = "Registro talleres";
include 'header_min.php';
?>

<div id="dialog" title="Detalle">
  <p></p>
</div>

<body>
	<div id="wrapper">
    <div id="main">
    <div id="title">
    <?php echo $titulo; ?>
    </div>
    	<div id="form">
	
<?php
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
?>


<?php
    $server="localhost";
    $database = "labcomputo_BD";
    $db_user = "root";
    $db_pass = "labmovil";
    $conn = mysql_connect($server, $db_user, $db_pass) or die ("error1:".mysql_errno().mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    @mysqli_query("SET NAMES 'utf8'");

    $v_nombre = mysql_real_escape_string(trim($_POST[nombre]));
    $v_apellidos = strtoupper(mysql_real_escape_string(trim($_POST[apellidos])));
    $v_procedencia = mysql_real_escape_string(trim($_POST[procedencia]));
    $v_curp = strtoupper(mysql_real_escape_string(trim($_POST[curp])));
    $v_email = mysql_real_escape_string(trim($_POST[email]));
    $v_taller = mysql_real_escape_string(trim($_POST[talleres]));
    $v_codigo = generarCodigo(6);
    
    $query = "CALL sp_registro('$v_curp','$v_nombre','$v_apellidos','$v_procedencia','$v_email','$v_taller','$v_codigo');";
    mysql_query($query);
/*   
$result=mysqli_query("SELECT nombre FROM talleres2014 WHERE id=".$v_taller, $conn);    
    $row=mysql_fetch_row($result);
    while ($row=mysql_fetch_row($result)) 
    { 
        $nTaller = $row[0];
        echo 'asasdasdad';
    } 
  */  
    mysqli_close($conn);
    $to = $v_email;
	$subject = "Registro a talleres XPTele 2014";
	$message = '<strong>'.$v_nombre.' '.$v_apellidos.'</strong> has quedado registrado al taller. Tu código de registro es <strong>'.$v_codigo.'</strong>. Guárdalo porque lo necesitarás para ingresar al taller.<br>'.
			  '<br>Si tienes alguna duda o quieres realizar algún cambio, por favor envía un email con '.
			  'tus datos a <strong>experienciastelematicas@gmail.com</strong><br>';

    $messageMail = ''.$v_nombre.' '.$v_apellidos.' has quedado registrado al taller '.$nTaller.'. '.
			  'Si tienes alguna duda o quieres realizar algún cambio, por favor envía un email con '.
			  'tus datos a experienciastelematicas@gmail.com';
			  
	$from = "experienciastelematicas@gmail.com";

    
    $headers = "From: experienciastelematicas@gmail.com";
    mail($to,$subject,$messageMail,$headers);

	echo 'Hemos recibido tus datos.<br><br>'.
		$message.'<br><br><strong>Laboratorio de Computo Movil</strong>';
?>
</body>
        
<?php
    include 'footer.php';
?>
