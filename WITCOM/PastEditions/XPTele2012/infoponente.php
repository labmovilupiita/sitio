<?php
$cons = mysql_query("SELECT * from ponentes where id = $_SESSION[id]");
if (mysql_num_rows($cons) != 1){
    echo '<h2>La información es incorrecta</h2><br> <INPUT type="button" value="Regresar al Formulario" onClick="history.back()">';
    die();
    }
$row = mysql_fetch_array($cons);
?>
<br />
<hr />
<h3><? echo $row{'nombre'}; ?></h3>
<hr />
<form method="post" action="menu.php" >
<table width="90%">
    <tr>
        <td width="30%">Nombre</td>
        <td><input type="text" name="nombre" size="40" autofocus value="<? echo $row['nombre']?>"/></td>
    </tr>
    <tr>
        <td width="30%">Empresa</td>
        <td><input type="text" name="empresa" size="40"  value="<? echo $row['empresa']?>"/></td>
    </tr>
    <tr>
        <td width="30%">Taller o Ponencia</td>
        <td><input type="text" name="ponencia" size="40" value="<? echo $row['ponencia']?>" /></td>
    </tr>
    <tr>
        <td width="30%">Palabras clave</td>
        <td><input type="text" name="clave" size="40" value="<? echo $row['clave']?>" /></td>
    </tr>
    <tr>
        <td width="30%">Perfil de la ponencia</td>
        <td><input type="text" name="perfil" size="20" value="<? echo $row['perfil']?>" /></td>
    </tr>
    <tr>
        <td width="30%">Resumen Ponencia</td>
        <td><textarea name="resumen" rows="12" cols="40"><? echo $row['resumen']?></textarea></td>
    </tr>
</table>
<br /><br />
<center>
<input type="submit" name="modif" value="Modificar" />
</center></form>