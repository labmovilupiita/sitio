<?php
session_start();
// migfelxpt
$titulo = "Administrar";
include 'header.php';
echo '<center><form name="ponencia" method="post" action="admin.php" autocomplete="off">';
$_SESSION['admin'] = "migf";
if(isset($_POST['enviar']) && md5($_POST['ingr'])== "ba9538200efb95a2dfdc622c8fa026c0"){
include 'myscon.ajs.php';
if(isset($_POST['index'])){
	extract($_POST);
	foreach($hr as $i => $value){
		mysql_query("UPDATE ponentes set hora = '$value' where id = $i") or die(mysql_error());
		}
	}
$cons = mysql_query("SELECT id, hora, nombre, ponencia, pass from ponentes ORDER BY hora") or die(mysql_error());
include 'mmenu.php';
?>
<table border="1" bordercolor="#EEEEEE" cellpadding="3" cellspacing="0" width="100%">
	<thead>
    <tr bgcolor="#CCCCCC">
      <td valign="middle" align="center" width="15%"><p><strong>Horario</strong></p></td>
      <td valign="middle" align="center" width="30%"><p><strong>Titulo</strong></p></td>
      <td valign="middle" align="center" width="25%"><p><strong>Ponente</strong></p></td>
      
    </tr>
    </thead>
   <tbody>

<?php
	while($row = mysql_fetch_array($cons)){ ?>
    <tr bgcolor="#FAFAFA">
      <td valign="middle" align="center"><p>
	  <input type="text" style="width: 70px" name="hr[<? echo $row['id']?>]" value="<? echo $row['hora']?>"  /></p></td>
      <td valign="middle" <?php
	  if ($row['pass'] == "none") {
		  echo 'align="center" colspan="2">'.$row['ponencia'].'</td>';
		  }
	  else {
	  ?>
      ><p><a href="ponente.php?id=<? echo $row['id']?>"><? echo $row['ponencia']; ?></a></p></td>
      <td valign="middle"><p><? echo $row['nombre']; ?></p></td>
	<? } ?>
    </tr>
   <?php

    } ?>


  </tbody>
</table>

<input type="hidden" name="ingr" value="<? echo $_POST['ingr'] ?>" />
<input type="hidden" name="index" value="ok" />
<p>&nbsp;</p>
<?
	}
else{

?>

<h2>Inicio de Sesi&oacute;n</h2>
<form name="ponencia" method="post" action="admin.php" autocomplete="off">
<input type="password" name="ingr" size="20" /><br />

<?php
}
echo '<input type="submit" value=" Siguiente " name="enviar" /></td></tr></table>
</form></center>';
include 'footer.php';
?>