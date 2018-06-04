<?php
include 'myscon.ajs.php';
include 'libs/util.php';
$cons = mysql_query("select b.id, b.ponencia, count(*) as usuarios from (select * from asistencia) as a join (select * from ponentes where taller = 1) as b on a.ponencia = b.id group by b.id");
$message = '<table width="100%" border="1" bordercolor="#EEEEEE"  bgcolor="#FAFAFA" cellpadding="3" cellspacing="0">';
$message = $message.'<tbody>';
$message = $message.'<tr bgcolor="#CCCCCC">';
	$message = $message.'<td width="20%" valign="middle" align="center" bgcolor="#999999"><strong>Id de Taller</strong></td>';
    $message = $message.'<td width="60%" valign="middle" bgcolor="#999999"><p><strong>Taller</strong></p></td>';
    $message = $message.'<td width="20%" valign="middle" bgcolor="#999999"><p><strong>N&uacutemero de inscritos</strong></p></td>';
$message = '</tr>';
while($row = mysql_fetch_array($cons)) {
	$message = $message.'<tr>';
		$message = $message.'<td>';
			$message = $message.$row['id'];
		$message = $message.'</td>';
		$message = $message.'<td>';
			$message = $message.$row['ponencia'];
		$message = $message.'</td>';
		$message = $message.'<td>';
			$message = $message.$row['usuarios'];
		$message = $message.'</td>';
	$message = $message.'</tr>';
}
$message = $message.'</tbody>';
$message = $message.'</table>';

echo '{"type":"bien","message":"'.$message.'"}';
?>