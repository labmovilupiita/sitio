<?php
session_start();
$titulo = "Registro";
include 'header.php';
include 'myscon.ajs.php';
if(isset($_POST['enviar'])){
	if(mysql_query("ALTER TABLE  asistencia ADD interes INT( 5 ) NULL DEFAULT NULL AFTER  ponencia")) $alter = "OK";
	else $alter = NULL;
	$sesion = mysql_query("SELECT plan from auditorio where boleta = $_POST[boleta] AND email = '$_POST[email]'");
	if(mysql_num_rows($sesion)!=1){
		echo '<br><br><br>No te encuentras Registrado. <br><br><br><br><br><a href="registro.php">Regresar</a>';
		include 'footer.php';
		die();
	}
	$row = mysql_fetch_array($sesion);
	$taller = '';
	$_SESSION['user'] = $_POST['boleta'];
	if(isset($_POST['A21']) && $_POST['A21'] > 0) {
		if($row['plan'] == 'e' && $_POST['A21'] == 3)
			$interes = 2;
		else
			$interes = $_POST['A21'];
		$taller.= "('', $_POST[boleta], 21, $interes), ";
		}	
	if(isset($_POST['A22']) && $_POST['A22'] > 0) {
		if($row['plan'] == 'e' && $_POST['A22'] == 3)
			$interes = 2;
		else
			$interes = $_POST['A22'];
		 $taller.= "('', $_POST[boleta], 22, $interes), ";
		}
	if(isset($_POST['A23']) && $_POST['A23'] > 0) {
		if($row['plan'] == 'e' && $_POST['A23'] == 3)
			$interes = 2;
		else
			$interes = $_POST['A23'];
		$taller.= "('', $_POST[boleta], 23, $interes), ";
		}
	if(isset($_POST['A24']) && $_POST['A24'] > 0) {
		if($row['plan'] == 'e' && $_POST['A24'] == 3)
			$interes = 2;
		else
			$interes = $_POST['A24'];
		$taller.= "('', $_POST[boleta], 24, $interes), ";
		}
	if(isset($_POST['A25']) && $_POST['A25'] > 0) {
		if($row['plan'] == 'e' && $_POST['A25'] == 3)
			$interes = 2;
		else
			$interes = $_POST['A25'];
		$taller.= "('', $_POST[boleta], 25, $interes), ";
		}
	$taller = substr($taller,0,-2);
	$query = "INSERT INTO asistencia (id, usuario, ponencia, interes) VALUES ".$taller;
	mysql_query($query) or die(mysql_error());
	$id_reg = mysql_query("Select id from asistencia where usuario = $_POST[boleta] AND interes = 3 AND ponencia > 20");
	if(mysql_num_rows($id_reg)> 0)
		$id_R = mysql_fetch_array($id_reg);
	else
		$id_R = false;
	echo '<p><br>
        <br><br><br><br>Hemos recibido tus datos, en breve nos comunicaremos contigo.<br>
        </p>';
		if($id_R) 
        echo '<p>Tu id de registro al taller es:<strong> '.$id_R['id'].'</strong>. Con &eacute;ste n&uacute;mero y tu n&uacute;mero de boleta pordr&aacute;s ingresar al laboratorio.</p>';
		else
		echo '<p>Has quedado en lista de espera para la apertura de talleres.</p>';
		echo '<p><br>
          <strong>Laboratorio de Cómputo Móvil</strong>
        </p>';
	}
else{
?>
       
<p align="center">Por favor, llena los siguientes campos que indicaste en tu registro, para inscribirte al taller de tu preferencia:</p><br>
        <form method="post" action="registro2.php" name="form" >
        
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
 <p><strong>Talleres que me interesan:</strong><br />
                 <span class="negro">Los talleres ser&aacute;n simult&aacute;neos (despues de las ponencias)  por lo tanto</span><span class="negro2"> s&oacute;lo puedes inscribirte a uno.</span> Seleccionalos de mayor a menor inter&eacute;s, el de mayor inter&eacute;s es el taller al que ser&aacute;s inscrito, en caso de ya no haber cupo, se te inscribe al segundo taller de tu preferencia y asi sucesivamente, hasta asignarte un lugar en algun taller. Si se desocupa un lugar en el taller de tu mayor interes, ser&aacute;s asignado inmediatamente al mismo. </p>
               <p class="amarillo2">NOTA: Si un taller tiene alta demanda, se analizar&aacute; la opci&oacute;n de abrir otro   taller del tema de tu inter&eacute;s en un horario diferente.</p>
             <?php $limite = 30;
			 		$max = 0; ?>
   <table width="100%" border="0" cellspacing="3" cellpadding="0">
             <tr bgcolor="#CCCCCC">
                 <td WIDTH="40%" align="center"><strong>Taller</strong></td>
                 <td align="center"><strong>Deseo Inscribirme</strong></td>
                 <td align="center"><strong>Me gustaría asistir</strong></td>
                 <td align="center"><strong>Tal vez asista</strong></td>
				 <td align="center"><strong>No me Interesa</strong></td>
               </tr>
             <?php
   			 $taller = mysql_query("SELECT COUNT( * ) total
						FROM  `asistencia` 
						WHERE ponencia =21");
			$taller = mysql_fetch_array($taller);
			$taller = $taller['total'];
			   ?>
<tr <? if ($taller >=$limite) { echo ' bgcolor="#FFAAAA"';
			   $max++;} else echo ' bgcolor="#FAFAFA"';?>>
                 <td><strong>Taller Apps</strong></td>
                 <td align="center"><input type="radio" name="A21" value="3"   <? if ($taller >=$limite) echo 'disabled="disabled"';?> onclick="unCheckRadio(A22);unCheckRadio(A23);unCheckRadio(A24);unCheckRadio(A25)"/></td>
                 <td align="center"><input type="radio" name="A21" value="2" /><? if ($taller >=$limite) echo '*';?></td>
                 <td align="center"><input type="radio" name="A21" value="1" /></td>
                 <td align="center"><input type="radio" name="A21" value="0" /></td>
               </tr>
<?php
   			 $taller = mysql_query("SELECT COUNT( * ) total
						FROM  `asistencia` 
						WHERE ponencia =22");
			$taller = mysql_fetch_array($taller);
			$taller = $taller['total'];
			   ?>
               <tr <? if ($taller >=$limite) { echo ' bgcolor="#FFAAAA"'; $max++; } else echo ' bgcolor="#FAFAFA"';?>>
                 <td><strong>BPEL: End-to-end process flow</strong></td>
                 <td align="center"><input type="radio" name="A22" value="3" <? if ($taller >=$limite) echo 'disabled="disabled"';?> onclick="unCheckRadio(A21);unCheckRadio(A23);unCheckRadio(A24);unCheckRadio(A25)" /></td>
                 <td align="center"><input type="radio" name="A22" value="2" /><? if ($taller >=$limite) echo '*';?></td>
                 <td align="center"><input type="radio" name="A22" value="1" /></td>
                 <td align="center"><input type="radio" name="A22" value="0" /></td>
               </tr>
               <?php
   			 $taller = mysql_query("SELECT COUNT( * ) total
						FROM  `asistencia` 
						WHERE ponencia =23");
			$taller = mysql_fetch_array($taller);
			$taller = $taller['total'];
			   ?>
<tr <? if ($taller >=$limite) { echo ' bgcolor="#FFAAAA"'; $max++; } else echo ' bgcolor="#FAFAFA"';?>>
                 <td><strong>Taller Lenguajes Funcionales</strong></td>
                 <td align="center"><input type="radio" name="A23" value="3" <? if ($taller >=$limite) echo 'disabled="disabled"';?> onclick="unCheckRadio(A22);unCheckRadio(A21);unCheckRadio(A24);unCheckRadio(A25)" /></td>
                 <td align="center"><input type="radio" name="A23" value="2" /><? if ($taller >=$limite) echo '*';?></td>
                 <td align="center"><input type="radio" name="A23" value="1" /></td>
                 <td align="center"><input type="radio" name="A23" value="0" /></td>
               </tr>
               <?php
   			 $taller = mysql_query("SELECT COUNT( * ) total
						FROM  `asistencia` 
						WHERE ponencia =24");
			$taller = mysql_fetch_array($taller);
			$taller = $taller['total'];
			   ?>
<tr <? if ($taller >=$limite) { echo ' bgcolor="#FFAAAA"'; $max++; } else echo ' bgcolor="#FAFAFA"';?>>
                 <td><strong>Telefon&iacute;a IP</strong></td>
                 <td align="center"><input type="radio" name="A24" value="3" <? if ($taller >=$limite) echo 'disabled="disabled"';?> onclick="unCheckRadio(A22);unCheckRadio(A23);unCheckRadio(A21);unCheckRadio(A25)" /></td>
                 <td align="center"><input type="radio" name="A24" value="2" /><? if ($taller >=$limite) echo '*';?></td>
                 <td align="center"><input type="radio" name="A24" value="1" /></td>
                 <td align="center"><input type="radio" name="A24" value="0" /></td>
               </tr>
               <?php
   			 $taller = mysql_query("SELECT COUNT( * ) total
						FROM  `asistencia` 
						WHERE ponencia =25");
			$taller = mysql_fetch_array($taller);
			$taller = $taller['total'];
			   ?>
<tr <? if ($taller >=$limite) { echo ' bgcolor="#FFAAAA"'; $max++; } else echo ' bgcolor="#FAFAFA"';?>>
                 <td><strong>TV Interactiva</strong></td>
                 <td align="center"><input type="radio" name="A25" value="3" <? if ($taller >=$limite) echo 'disabled="disabled"';?> onclick="unCheckRadio(A22);unCheckRadio(A23);unCheckRadio(A24);unCheckRadio(A21)" /></td>
                 <td align="center"><input type="radio" name="A25" value="2" /><? if ($taller >=$limite) echo '*';?></td>
                 <td align="center"><input type="radio" name="A25" value="1" /></td>
                 <td align="center"><input type="radio" name="A25" value="0" /></td>
               </tr>
             </table>
             <p><br>
          <? if($max > 0) { ?><center>
            <table width="70%" bgcolor="#FFAAAA">
             <tr><td><b>Nota: </b><br />
            Los talleres marcados con rojo se encuentran en su cupo máximo, si seleccionas "<strong>Me gustarís asistir</strong>" puede contemplarse la posibilidad de abrir un nuevo taller.</td></tr></table></center> <? } ?>
               <br>
             </p>
 <center><input type="submit" name="enviar" value="Confirmar" /></center>
</form>

<?php
}
include 'footer.php';
?>