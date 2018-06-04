<?php
session_start();
$titulo = "Sesión";
include 'header.php';
include 'myscon.ajs.php';
if(isset($_POST['enviar'])){
	$sesion = mysql_query("SELECT nombre from auditorio where boleta = $_POST[boleta] AND email = '$_POST[email]'");
	if(mysql_num_rows($sesion)!=1){
		echo '<br><br><br>No te encuentras Registrado. <br><br><br><br><br><a href="registro.php">Regresar</a>';
		include 'footer.php';
		die();
	}
	$sesion = mysql_query("SELECT nombre, plan, avance, email, boleta from auditorio where boleta = $_POST[boleta] AND email = '$_POST[email]'");
	$row = mysql_fetch_array($sesion);
	echo 'Hola, <b>'.$row['nombre'].'</b>.<br><br>
	Te encuentras registrado con la boleta <strong>'.$row['boleta'].
	'</strong> y el email <strong>'.$row['email'].'</strong> y te registraste como ';
	if (strtolower($row['plan']) == 'e')
		echo '<b>Egresado</b>.';
	else{
		if (strtolower($row['plan']) == 'n') {
			echo 'estudiante con ';
			$po = $row['avance']*10;
			echo $po.'% de avance en el <b>nuevo plan</b>'; 
			}
		elseif (strtolower($row['plan']) == 'v') {
			echo 'estudiante del semestre '.$row['avance'].
			' del <b>nuevo plan</b>'; 
			}
	}
	echo '<br><br>';
	$reg = mysql_query("SELECT id, usuario, max(ponencia) ponencia from asistencia where usuario = $row[boleta] and interes = 3 and ponencia > 20 group by usuario");
	if (mysql_num_rows($reg) < 1) {
		echo '<br> Estás en lista de espera para la apertura de ';
		$reg2 = mysql_query("SELECT ponencia from asistencia where usuario = $_POST[boleta] and interes = 2 and ponencia > 20");
		if (mysql_num_rows($reg2) < 1) {
			echo "nuevos talleres";
			}
		else{
			echo 'los talleres: <br><ul>';
			while($col = mysql_fetch_array($reg2)){
				if($col['ponencia'] == 21) echo '<li>Taller Apps</li>';
				if($col['ponencia'] == 22) echo '<li>BPEL: End-to-end process flow</li>';
				if($col['ponencia'] == 23) echo '<li>Taller Lenguajes Funcionales</li>';
				if($col['ponencia'] == 24) echo '<li>Telefonía IP</li>';
				if($col['ponencia'] == 25) echo '<li>TV Interactiva</li>';
				if($col['ponencia'] == 26) echo '<li>Trabajando con Google Maps y Sql Server 2008</li>';
				if($col['ponencia'] == 27) echo '<li>Evaluacion financiera</li>';
				if($col['ponencia'] == 28) echo '<li>Aplicaciones Nativas para iOS 5 ( iPhone, iPod,iPad)</li>';
				if($col['ponencia'] == 29) echo '<li>Telefonía IP (nuevo horario: 13 a 15 hrsewaerr  )</li>';
					}
			echo '</ul>';
			}

	$fila = mysql_fetch_array($reg);
	echo '<hr>Si lo deseas, puedes cancelar tu solicitud de lista de espera y realizar tu inscripción a uno de los siguientes talleres que aún cuentan con cupo:<br><br>';
	$ponencias = mysql_query("SELECT COUNT( * ) total, ponencia
					FROM asistencia
					WHERE interes =3
					GROUP BY ponencia
					HAVING COUNT( * ) <30");
	
	?>
     <form method="post" action="nuevos_talleres.php" name="form" >
<center> <table width="80%" border="0" cellspacing="3" cellpadding="0">
           <tr bgcolor="#CCCCCC">
                 <td width="10%" align="center">&nbsp;</td>
                 <td width="90%" align="center"><strong>Taller</strong></td>
               </tr>
       <?php
	   while($pcias = mysql_fetch_array($ponencias)) {
	    if($pcias['ponencia'] == 21) {
			?>
       <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="21" /></td>
                 <td><p><strong>Taller Apps</strong></p></td>
               </tr>
       <? } elseif($pcias['ponencia'] == 22) {
			?>
       <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="22" /></td>
                 <td><p> <strong>BPEL: End-to-end process flow</strong></p></td>
       </tr>
       <? } elseif($pcias['ponencia'] == 23) {
			?>
       <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="23" /></td>
                 <td><p><strong>Taller Lenguajes Funcionales</strong></p></td>
               </tr>

        <? } elseif($pcias['ponencia'] == 24) {
			?>
        <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="24" /></td>
                 <td><p><strong>Telefonía IP</strong></p></td>
               </tr>
        <? } elseif($pcias['ponencia'] == 25) {
			?>
<tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="25" /></td>
                 <td><p><strong>TV Interactiva</strong></p></td>
               </tr>
               <? } elseif($pcias['ponencia'] == 26) {
			?>
        <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="26" /></td>
                 <td><p><strong>Trabajando con Google Maps y Sql Server 2008<br />
                 </strong></p></td>
               </tr>
        <? } elseif($pcias['ponencia'] == 27) {
			?>
               <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="27" /></td>
                 <td> <strong>Evaluacion financiera<br /></strong></td>
               </tr>

        <? } elseif($pcias['ponencia'] == 28) {
			?>
<tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="28" /></td>
                 <td> <strong>Aplicaciones Nativas para iOS 5 ( iPhone, iPod,iPad)<br /></strong></td>
               </tr>
			  <? } ?>
        <? } ?>
             </table>

            <p>&nbsp;    </p>
            <p>
              <input type="submit" name="enviar" value="Confirmar" />
            </p>
    </center>
    <input type="hidden" name="boleta" value="<? echo $row['boleta']; ?>" />
<input type="hidden" name="email" value="<? echo $row['email']; ?>" />
</form>
    <?php
	}
	else { // Esta inscrito a algún taller
		echo '<br>Te encuentras inscrito al taller: <b>';
		$reg2 = mysql_query("SELECT id, ponencia from asistencia where usuario = $_POST[boleta] and interes = 3 and ponencia > 20");
		$col = mysql_fetch_array($reg2);
		if($col['ponencia'] == 21) echo 'Taller Apps';
		elseif($col['ponencia'] == 22) echo 'BPEL: End-to-end process flow';
		elseif($col['ponencia'] == 23) echo 'Taller Lenguajes Funcionales';
		elseif($col['ponencia'] == 24) echo 'Telefonía IP';
		elseif($col['ponencia'] == 25) echo 'TV Interactiva';
		elseif($col['ponencia'] == 26) echo 'Trabajando con Google Maps y Sql Server 2008';
		elseif($col['ponencia'] == 27) echo 'Evaluacion financiera';
		elseif($col['ponencia'] == 28) echo 'Aplicaciones Nativas para iOS 5 ( iPhone, iPod,iPad)';
		elseif($col['ponencia'] == 29) echo 'Telefonía IP (nuevo horario: 13 a 15 hrs)';
		echo '</b> con ID DE REGISTRO: <font color="#FF0000">'.$col['id'].'</font>';
		
//	if(date('d')>=13)
	{
	$nume = mysql_query("SELECT id from asistencia where interes = 3 and ponencia = $col[ponencia]");
	if(mysql_num_rows($nume) > 15){
		
		?><form method="post" action="cambiar_taller.php" name="form" ><center><br /><br />
         <table width="70%" bgcolor="#FFAAAA">
                     <tr><td><b>Nota: </b><br />
                    A partir de hoy, podrás realizar por <strong>única vez</strong> un cambio de taller a otro que aún tenga cupo.<br /><br /><strong>NO PODRAS CANCELAR EL CAMBIO QUE REALICES</strong>  <br />       <center>
                        <input type="hidden" name="boleta" value="<? echo $row['boleta']; ?>" />
<input type="hidden" name="email" value="<? echo $row['email']; ?>" />
                    <input type="submit" name="enviar" value="Realizar Cambio" /></center>
</td></tr></table></center>
                       <br>
                     </p>
        </form>
                <?php
		}
		}
}
	}

else{
?>
<br /><br />

        <form method="post" action="registrados.php" name="form" >
        
        	<table width="99%" cellpadding="5">
                <tr>
                	<td width="40%" align="left">No. de Boleta:</td>
                    <td width="110%" align="left"><input type="text" required size="12" autofocus name="boleta" placeholder="2011641234"/></td>
                    </tr>
                <tr>
                	<td align="left">Correo Electrónico:</td>
                    <td><input type="email" placeholder="correo@email.com" size="40" name="email" required/></td>
                </tr>
       </table><center>
<input type="submit" name="enviar" value="Visualizar" /></center>

</form>

<?php
}
include 'footer.php';
?>