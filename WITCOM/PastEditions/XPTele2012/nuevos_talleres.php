<?php
session_start();
$titulo = "Registro";
include 'header.php';
include 'myscon.ajs.php';
if(isset($_POST['enviar'])){
$sesion = mysql_query("SELECT plan from auditorio where boleta = $_POST[boleta] AND email = '$_POST[email]'");

if(mysql_num_rows($sesion)!=1){
		echo '<br><br><br>No te encuentras Registrado. 
		<br><br><br><br><br><a href="registro.php">Registrarte</a>';
		include 'footer.php';
		die();
	}
else{
if(empty($_POST['taller'])){
	echo '<br><br><br>No has seleccionado ningún taller';
		include 'footer.php';
		die();
	}
$inscripcion = mysql_query("SELECT boleta, ponencia from asistencia, auditorio
			WHERE usuario = boleta AND interes = 3 AND boleta = $_POST[boleta]") or die(mysql_error());
	if(mysql_num_rows($inscripcion) < 1 || isset($_POST['cambio'])){
		mysql_query("delete from asistencia where usuario = $_POST[boleta] and ponencia > 20") or die(mysql_error());
		mysql_query("INSERT INTO asistencia (id, usuario, ponencia, interes) 
		VALUES
		('', $_POST[boleta], $_POST[taller], 3)
		") or die(mysql_error());
		echo '<p><br>
			<br><br><br><br>has sido correctamente registrado.<br>
			</p>';
			echo '<p><br>
			  <strong>Laboratorio de Cómputo Móvil</strong>
			</p>';
include 'footer.php';
		die();
		}
	else {
		echo '<br><br><br>Ya estás inscrito a un taller, se te notificará en caso de que decidas retirar su inscripción de ese taller.</a>';
		include 'footer.php';
		die();
		}
	}
}
	
else{
?>
       
<p align="center">Por favor, llena los siguientes campos que indicaste en tu registro, para inscribirte al taller de tu preferencia:</p><br>
        <form method="post" action="nuevos_talleres.php" name="form" >
        
        	<table width="99%" cellpadding="5">
                <tr>
                	<td width="40%" align="left">No. de Boleta:</td>
                    <td width="110%" align="left"><input type="text" required size="12" autofocus name="boleta" placeholder="2011641234"/></td>
                    </tr>
                <tr>
                	<td align="left">Correo Electrónico:</td>
                    <td><input type="email" placeholder="correo@email.com" size="40" name="email" required/></td>
                </tr>
       </table>
 <p>&nbsp;</p>
 <table width="100%" border="0" cellspacing="3" cellpadding="0">
           <tr bgcolor="#CCCCCC">
                 <td width="10%" align="center">&nbsp;</td>
                 <td width="40%" align="center"><strong>Taller</strong></td>
                 <td width="50%" align="center">Descripci&oacute;n</td>
			   </tr>
<tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="26" /></td>
                 <td><p><strong>Trabajando con Google Maps y Sql Server 2008<br />
                 </strong>Rafael Olvera </p></td>
                 <td> En el taller se dara una introduccion muy breve a las tecnologias Geoespaciales que ofrece Google Inc. centrandose en su producto Google Maps API</td>
               </tr>
               <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="27" /></td>
                 <td> <strong>Evaluacion financiera</strong><br />
Gerardo Zamitis </td>
                 <td> Se enfocara en el analisis de viabilidad de negocio por mercado y economico-financiero&quot; . Basicamente mostrarles como es que los negocios pueden resultar muy interesantes independienteme de si su gusto son las comunicaciones, el computo o ambas. </td>
               </tr>

<tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="28" /></td>
                 <td> <strong>Aplicaciones Nativas para iOS 5 ( iPhone, iPod,iPad)</strong><br />
                 Jose Alejandro Moreno Alanis </td>
                 <td><p>Descubre Xcode 4.3 el IDE Para desarrollar en dispositivos de Apple y el lenguaje objective C, se tratara de una breve introducci&oacute;n , preguntas y respuestas,con un demo sencillo&nbsp; de como poder hacer apps en los dispositivos Apple <strong>(se recomienda traer una laptop Mac y con X code instalado, se descarga gratis desde Apple o en el mismo taller se te proporcionara el instalador)</strong></p></td>
               </tr>
             </table>
             <p><br>
<center>
            <table width="70%" bgcolor="#FFAAAA">
             <tr><td><b>Nota: </b><br />
            Solo puedes inscribirte a uno de estos talleres si no est&aacute;s inscrito a otro, ya que ser&aacute;n simult&aacute;neos.</td></tr></table></center> <? } ?>
               <br>
             </p>
 <center><input type="submit" name="enviar" value="Confirmar" /></center>
</form>

<?php

include 'footer.php';
?>