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
	$sesion = mysql_query("SELECT nombre, boleta, email, ponencia from auditorio, asistencia where boleta = $_POST[boleta] AND email = '$_POST[email]' and usuario = boleta and interes = 3");
	$col = mysql_fetch_array($sesion);
	echo 'Hola, <b>'.$col['nombre'];
	echo '<br><br>';
?>
<table width="100%" bgcolor="#FFAAAA">
     <tr><td align="center">
       <p><b>Estás a punto de abandonar el taller:
       </b></p>
       <p><b>
        <?php	

	if($col['ponencia'] == 21) echo 'Taller Apps';
		elseif($col['ponencia'] == 22) echo 'BPEL: End-to-end process flow';
		elseif($col['ponencia'] == 23) echo 'Taller Lenguajes Funcionales';
		elseif($col['ponencia'] == 24) echo 'Telefonía IP';
		elseif($col['ponencia'] == 25) echo 'TV Interactiva';
		elseif($col['ponencia'] == 26) echo 'Trabajando con Google Maps y Sql Server 2008';
		elseif($col['ponencia'] == 27) echo 'Evaluacion financiera';
		elseif($col['ponencia'] == 28) echo 'Aplicaciones Nativas para iOS 5 ( iPhone, iPod,iPad)';
		elseif($col['ponencia'] == 29) echo '<li>Telefonía IP (nuevo horario: 13 a 15 hrsewaerr  )</li>';
		
			$ponencias = mysql_query("SELECT COUNT( * ) total, ponencia
					FROM asistencia
					WHERE interes =3
					and ponencia <> $col[ponencia]
					GROUP BY ponencia
					HAVING COUNT( * ) <30");
?>
        </b><br />
       </p>
       <p>NO PODRAS CANCELAR EL CAMBIO QUE REALICES</strong>  <br />
       </p></td></tr></table>
<p>&nbsp;</p>
<form method="post" action="nuevos_talleres.php" name="form" >
<center>Inscribirme al taller: 
<br /><br /> <table width="80%" border="0" cellspacing="3" cellpadding="0">
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
       <? } if($pcias['ponencia'] == 22) {
			?>
       <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="22" /></td>
                 <td><p> <strong>BPEL: End-to-end process flow</strong></p></td>
       </tr>
       <? } if($pcias['ponencia'] == 23) {
			?>
       <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="23" /></td>
                 <td><p><strong>Taller Lenguajes Funcionales</strong></p></td>
               </tr>

        <? } if($pcias['ponencia'] == 24) {
			?>
        <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="24" /></td>
                 <td><p><strong>Telefonía IP</strong></p></td>
               </tr>
        <? } if($pcias['ponencia'] == 25) {
			?>
<tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="25" /></td>
                 <td><p><strong>TV Interactiva</strong></p></td>
               </tr>
               <? } if($pcias['ponencia'] == 26) {
			?>
        <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="26" /></td>
                 <td><p><strong>Trabajando con Google Maps y Sql Server 2008<br />
                 </strong></p></td>
               </tr>
        <? } if($pcias['ponencia'] == 27) {
			?>
               <tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="27" /></td>
                 <td> <strong>Evaluacion financiera<br /></strong></td>
               </tr>

        <? } if($pcias['ponencia'] == 28) {
			?>
<tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="28" /></td>
                 <td> <strong>Aplicaciones Nativas para iOS 5 ( iPhone, iPod,iPad)<br /></strong></td>
               </tr>
         <? } elseif($pcias['ponencia'] == 29) {
			?>
<tr bgcolor="#FAFAFA">
                 <td align="center"><input type="radio" name="taller" value="29" /></td>
                 <td> <strong>Telefonía IP (horario de 13 a 15 horas)<br /></strong></td>
               </tr>
			  <? } ?>
        <? } ?>
             </table>

            <p>&nbsp;    </p>
            <p>
              
            </p>

    <input type="hidden" name="boleta" value="<? echo $col['boleta']; ?>" />
<input type="hidden" name="email" value="<? echo $col['email']; ?>" />
<input type="hidden" name="cambio" value="cambio" />
<input type="submit" name="enviar" value="Confirmar" />    </center>
</form>
<?php

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