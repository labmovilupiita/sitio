<?php
session_start();
$titulo = "Registro";
include 'header.php';
include 'myscon.ajs.php';
if(isset($_POST['enviar'])){
	if($_POST['plan'] == 'n') {
		$plan = 'n';
		$avance = $_POST['nplan'];
		}
	else if($_POST['plan'] == 'n'){
		$plan = 'v';
		$avance = $_POST['vplan'];
	}
	else{
		$plan = 'e';
		$avance = null;
		}

	mysql_query("INSERT INTO auditorio (boleta, nombre, apellidos, email, plan, avance) VALUES
	($_POST[boleta],'$_POST[nombre]', '$_POST[apellidos]', '$_POST[email]', '$plan',  '$avance')") or die('<br><br><br>Ya has sido registrado. <br><br><br><br><br><a href="registro.php">Regresar</a>');
	$concatena = '';
	foreach($_POST['ponencias'] as $i => $idponencia){
		$concatena.= "('', $_POST[boleta], $idponencia), ";
		}
	$concatena = substr($concatena,0,-2);
	$query = "INSERT INTO asistencia (id, usuario, ponencia) VALUES ".$concatena;
	mysql_query($query) or die(mysql_error());
	$_SESSION['user'] = $_POST['boleta'];
	echo "<br><br><br><br><br>Hemos recibido tus datos, en breve nos comunicaremos contigo.<br><br><strong>Laboratorio de Cómputo Móvil</strong>";
	}
else{
?>
        <p align="center">Por favor, llena los siguientes campos:</p><br>
        <form method="post" action="registro.php" >
        
        	<table width="99%" cellpadding="5">
                <tr>
                	<td align="left">No. de Boleta:</td>
                    <td colspan="3" align="left"><input type="text" required size="12" autofocus name="boleta" placeholder="2011641234"/></td>
                    </tr>
                    <tr>
                	<td width="40%" align="left">Nombre:</td>
                    <td colspan="3"><input type="text" required size="40"  name="nombre"/></td>
                </tr>
                <tr>
                	<td align="left">Apellidos:</td>
                    <td colspan="3"><input type="text" required size="40" name="apellidos"/></td>
                </tr>
                <tr>
                	<td align="left">Correo Electrónico:</td>
                    <td colspan="3"><input type="email" placeholder="correo@email.com" size="40" name="email" required/></td>
                </tr>
                <tr>
                	<td align="left">Plan de estudios:</td>
                    <td width="20%" align="center"><input type="radio" name="plan" value="v" required onClick="viejo(this)" /> 1998 
                    </td>
                    <td align="center" width="40%">
                    <input type="radio" name="plan" value="n" required onClick="nuevo(this)" /> 2009</td>
                    <td align="center" width="40%">
                    <input type="radio" name="plan" value="e" required onClick="egresado(this)" /> Egresado</td>
                </tr>
                <tr>
                	<td align="left"> </td>
                    <td width="30%" align="center">
                    <div id="tv" style="visibility: hidden">Semestre</div>
                    <select name="vplan" id="vplan" required style="visibility: hidden; width: 70px">
                    	<option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                    </td>
                    <td width="30%" align="center">
                    <div id="tn" style="visibility: hidden">Porcentaje de Avance</div>
                    <select name="nplan" id="nplan" style="visibility: hidden; text-align:right; width: 70px">
                    	<option value="1">10 %</option>
                        <option value="2">20 %</option>
                        <option value="3">30 %</option>
                        <option value="4">40 %</option>
                        <option value="5">50 %</option>
                        <option value="6">60 %</option>
                        <option value="7">70 %</option>
                        <option value="8">80 %</option>
                        <option value="9">90 %</option>
                        <option value="10">100 %</option>
                    </select></td>
                    <td></td>
                </tr>
             </table><h4>Ponencias que me interesan</h4>
             <?php
			 $cur = mysql_query("Select ponencia, id, empresa 
			 from ponentes order by id limit 0,11");
			 while($fila = mysql_fetch_array($cur)){
				 echo '<input name="ponencias[]" type="checkbox" value="'.$fila['id'].'" /><b>'.$fila['ponencia'].'</b> ('.$fila['empresa'].')<br />';
				 }
			 ?>
             
             <br><br>
             <center><input type="submit" name="enviar" value="Confirmar" /></center>
             </form>

<?php
}
include 'footer.php';
?>