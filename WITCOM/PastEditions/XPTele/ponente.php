<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
</head>    
<?php

$titulo = "Ponencia";
$pin = $_GET['id'];
include 'myscon.ajs.php';
$cons = mysql_query("SELECT * from ponentes where id = $pin");
$row = mysql_fetch_array($cons);
?>
<br />
<hr />

<h3><? echo $row{'nombre'}; ?></h3>

<hr />

<p><strong><?  echo (($row['taller']=='1')?'Taller:':'Ponencia:') ?></strong> <? echo $row{'ponencia'}; ?></p>
<p><strong>Empresa: </strong><? echo $row{'empresa'}; ?> </p>
<p><strong>Palabras clave: </strong><? echo $row{'clave'}; ?></p>
<h3>Resumen:</h3>
<p align="justify" style="padding-right:40px"><? echo $row{'resumen'}; ?></p>
<? if ($row['taller']=='1') {?>
<h3>Perfil del alumno:</h3>
<p align="justify" style="padding-right:40px"><? echo $row{'taller_perfil'}; ?></p>
<h3>Requerimientos de Hardware:</h3>
<p align="justify" style="padding-right:40px"><? echo $row{'taller_reqh'}; ?></p>
<h3>Requerimientos de Software:</h3>
<p align="justify" style="padding-right:40px"><? echo $row{'taller_reqs'}; ?></p>
<? }?>
<p><strong>Hora inicio: </strong>
    <? echo (($row['adm_hora_inicio'] == NULL)?"No establecido al momento":$row['adm_hora_inicio'])?>
</p>
<p><strong>Hora fin: </strong>
    <? echo (($row['adm_hora_fin'] == NULL)?"No establecido al momento":$row['adm_hora_fin'])?>
</p>
<p><strong>Lugar: </strong>
    <? echo (($row['adm_lugar'] == NULL)?"No establecido al momento":$row['adm_lugar'])?>
</p>
</html>