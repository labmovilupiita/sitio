<?php
//require_once 'libs/Swift-4.3.1/lib/swift_required.php';
include 'myscon.ajs.php';
$titulo = "Recuperar Contrase&ntilde;a";
include 'header_min.php';

?>
<script>

  $(document).ready(function(){
		$( "#opt_ponente" ).on( "click", function( event ) {
		$("#email").show();
	        $("#ife").hide();
	    });	

		$( "#opt_usuario" ).on( "click", function( event ) {
		$("#email").hide();
	        $("#ife").show();
	    });
});	


</script>

</head>

<body>
	<div id="wrapper">
    <div id="main">
    <div id="title">
    <? echo $titulo; ?>
    </div>
    	<div id="form">
	
<br /><br />

<?php
if(isset($_POST['enviar'])){
	
	// -- VERIFICA EL TIPO DE USUARIO
	if($_POST[tipo_usuario] == 'u'){
		$ife =mysql_real_escape_string(trim($_POST[ife]));
		$sesion = mysql_query("SELECT email, pass, id_usuario from auditorio where ife = '$ife'");
	}else{
		$email =mysql_real_escape_string(trim($_POST[email]));
		$sesion = mysql_query("SELECT email, pass from ponentes where email = '$email'");
	}
	if(mysql_num_rows($sesion)!=1){
            if($_POST[tipo_usuario] == 'u'){
		echo '<br><br><br>No te encuentras Registrado. <br><br><br><br><br><a href="registro.php">Registrar</a>';
            }else{
                echo '<br><br><br>No te encuentras Registrado. <br><br><br><br><br><a href="regp.php">Registrar</a>';
            }    
		include 'footer.php';
		die();
	}
	
	$row = mysql_fetch_array($sesion);
	
	//ENVIO DE CORREO 	

	//$to = $row[email].',xptele2013@gmail.com';
        $to = $row[email];
	$subject = "Clave Congreso Telemática [2013]";
        if($_POST[tipo_usuario] == 'u'){
            $message = 'Tu usuario: <strong>user_'.$row[id_usuario].'</strong><br><br>Tu contraseña: <strong>'.$row[pass].'</strong><br><br>'.
			  'Estás invitado a las ponencias pero los talleres depende de la disponiblidad';
        }else{
             $message = 'Tu contraseña: '.$row[pass].' '.
			  'la ponencia será activada cuando el admnistrador valide tu información.';           
        }
	$from = "experienciastelematicas@gmail.com";
	$headers = "From: $from";
	//mail($to,$subject,$message,$headers);
        $body =$message;
        //include './mmail.php';
        if($_POST[tipo_usuario] == 'u'){
            echo $message.'<br><br><br><br><br><a href="consulta_registro.php">Ingresar</a>';
        }else{
            echo $message.'<br><br><br><br><br><a href="consulta_regp.php">Ingresar</a>';
        }    
	include 'footer.php';
	die();


}
?>


        <form method="post" action="recupera_pass.php" name="form" >
        
        	<table width="99%" cellpadding="5">
                <tr>
		 <td align="left" width="40%">Usuario:

		</td>
		<td><input type="radio" name="tipo_usuario"  value="p" id="opt_ponente" required  />Ponente
                <input type="radio" name="tipo_usuario"  value="u" id="opt_usuario" required  />Usuario</td>
                </tr>

		<p id="section_ife">
                <tr>
		
                    <td width="40%" align="left">CURP:</td>
                    <td width="110%" align="left"><input type="text" size="40" autofocus name="ife" id="ife"/></td>
                    </tr>
		</p>
		
		<p id="section_email">
                <tr>

                <td align="left">Correo Electr&oacute;nico:</td>
                 <td><input type="email" placeholder="correo@email.com" size="40" name="email" id="email"/></td>
                </tr>
		</p>	
		
       </table><center>
<input type="submit" name="enviar" value="Recuperar" /></center>

</form>

<?php
include 'footer.php';
?>
