<?php
include 'myscon.ajs.php';
include 'libs/util.php';
$cons = mysql_query("select nombre, apellidos, email from auditorio");
$message = '<table width="100%" border="1" bordercolor="#EEEEEE"  bgcolor="#FAFAFA" cellpadding="3" cellspacing="0">';
$message = $message.'<tbody>';
$message = $message.'<tr bgcolor="#CCCCCC">';
	$message = $message.'<td width="10%" valign="middle" align="center" bgcolor="#999999"><strong>Id</strong></td>';
	$message = $message.'<td width="30%" valign="middle" align="center" bgcolor="#999999"><strong>Id de Taller</strong></td>';
    $message = $message.'<td width="30%" valign="middle" bgcolor="#999999"><p><strong>Taller</strong></p></td>';
    $message = $message.'<td width="30%" valign="middle" bgcolor="#999999"><p><strong>N&uacutemero de inscritos</strong></p></td>';
$message = '</tr>';
$count = 1;
while($row = mysql_fetch_array($cons)) {
	$message = $message.'<tr>';
		$message = $message.'<td>';
			$message = $message.$count;
		$message = $message.'</td>';
		$message = $message.'<td>';
			$message = $message.$row['nombre'];
		$message = $message.'</td>';
		$message = $message.'<td>';
			$message = $message.$row['apellidos'];
		$message = $message.'</td>';
		$message = $message.'<td>';
			$message = $message.$row['email'];
		$message = $message.'</td>';
	$message = $message.'</tr>';
	$count = $count + 1;
}
$message = $message.'</tbody>';
$message = $message.'</table>';

echo '{"type":"bien","message":"'.$message.'"}';
?>