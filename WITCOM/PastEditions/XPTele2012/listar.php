<?php
session_start();
$titulo = "Ponentes";
include 'header.php';
include 'myscon.ajs.php';
$cons = mysql_query("SELECT id, nombre, ponencia, clave, perfil from ponentes ORDER by nombre");
?><center>
<table border="1" bordercolor="#EEEEEE" cellpadding="3" cellspacing="0" width="90%">
	<thead>
    <tr bgcolor="#CCCCCC">
      <td valign="middle" align="center" width="30%"><p><strong>Nombre</strong></p></td>
      <td valign="middle" align="center" width="70%"><p><strong>Ponencia</strong></p></td>
    </tr>
</thead>
<?
while($row=mysql_fetch_array($cons)){
	echo '<tr bgcolor="#FAFAFA"><td valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$row['nombre'].'</td>
	<td><b>'.$row['ponencia'].'</b><br />
	<b>Clave: </b>'.$row['clave'].'<br />
	<b>Perfil: </b>'.$row['perfil'].'
	</td></tr>';
	}
?>
</table>
<?php
include 'footer.php';
?>