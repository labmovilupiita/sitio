<?php
$titulo = "Ponentes";
include 'header.php';
include 'myscon.ajs.php';
$cons = mysql_query("SELECT id, nombre, ponencia from ponentes ORDER by nombre");
?><center>
<p>Selecciona el nombre del ponente para ver informaci&oacute;n sobre su ponencia</p>
<table border="1" bordercolor="#EEEEEE" cellpadding="3" cellspacing="0" width="90%">
	<thead>
    <tr bgcolor="#CCCCCC">
      <td valign="middle" align="center" width="40%"><p><strong>Nombre</strong></p></td>
      <td valign="middle" align="center" width="60%"><p><strong>Ponencia</strong></p></td>
    </tr>
</thead>
<?
while($row=mysql_fetch_array($cons)){
	echo '<tr bgcolor="#FAFAFA"><td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="ponente.php?id='.$row['id'].'">'.$row['nombre'].'</a></td>
	<td>'.$row['ponencia'].'</td></tr>';
	}
?>
</table>
<?php
include 'footer.php';
?>