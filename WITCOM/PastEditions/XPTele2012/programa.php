<?php
session_start();
$titulo = "Programa";
include 'header.php';
include 'myscon.ajs.php';
$cons = mysql_query("SELECT id, hora, nombre, ponencia, empresa, pass from ponentes ORDER BY hora") or die(mysql_error());

?>
<p align="center"><strong>Programa de conferencias Experiencias Telematicas. Sabado 16 de junio 2012, 9:00-18 hrs</strong></p>
<table width="100%" border="1" bordercolor="#EEEEEE"  bgcolor="#FAFAFA" cellpadding="3" cellspacing="0">
  <tbody>
    <tr bgcolor="#CCCCCC">
      <td width="15%" valign="middle" align="center" bgcolor="#999999"><strong>Horario</strong></td>
      <td width="41%" valign="middle" bgcolor="#999999"><p><strong>Titulo</strong></p></td>
      <td width="19%" valign="middle" bgcolor="#999999"><p><strong>Ponente</strong></p></td>
      <td width="25%" valign="middle" bgcolor="#999999"><p><strong>Empresa</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p><strong>8:00-9:00</strong></p></td>
      <td colspan="3" valign="middle"><p><strong>REGISTRO, SERVICIO DE CAFE Y BOCADILLOS</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p>9:00-9:10</p></td>
      <td colspan="3" valign="middle"><p>Inauguraci&oacute;n (Director UPIITA)</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>9:10-9:40</p></td>
      <td valign="middle"><p>Con&oacute;cete a ti mismo</p></td>
      <td valign="middle"><p>Gerardo Zamitis</p></td>
      <td valign="middle"><p>Comertel argos SA de CV</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>9:40-10:10</p></td>
      <td valign="middle"><p>Telem&aacute;ticos&nbsp; creando oportunidades en la Telefon&iacute;a IP</p></td>
      <td valign="middle"><p>Mario Daniel Ortega Vazquez</p></td>
      <td valign="middle"><p>Neocenter</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>10:10-10:40</p></td>
      <td valign="middle"><p>El camino de la certificaci&oacute;n en la programaci&oacute;n</p></td>
      <td valign="middle"><p>Mauricio E. De la Cruz Sanchez</p></td>
      <td valign="middle"><p>Banco Azteca</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>10:40-11:10</p></td>
      <td valign="middle"><p>Hello, real world!!</p></td>
      <td valign="middle"><p>Fabian Mendieta Arroyo</p></td>
      <td valign="middle"><p>Intellego</p></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>11:10-11:25</strong></p></td>
      <td colspan="3" valign="middle" bgcolor="#999999"><p><strong>SERVICIO DE CAFETER&Iacute;A Y FRUTA</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p>11:25-11:55</p></td>
      <td valign="middle"><p>Data Minning: El valor de la informaci&oacute;n</p></td>
      <td valign="middle"><p>Luz Adriana Torres Ramos</p></td>
      <td valign="middle"><p>OCESA</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>11:55-12:25</p></td>
      <td valign="middle"><p>La banca en M&eacute;xico: las ITs y el campo laboral.</p></td>
      <td valign="middle"><p>&nbsp;Jose Alberto Juarez Garcia</p></td>
      <td valign="middle"><p>CitiBank-Banamex</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>12:25-12:55</p></td>
      <td valign="middle"><p>Proyectos de tecnolog&iacute;as de la informaci&oacute;n y comunicaciones en el &aacute;mbito de los negocios</p></td>
      <td valign="middle"><p>David Fuentes</p></td>
      <td valign="middle"><p>PricewaterhouseCoopers</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>12:55-13:25</p></td>
      <td valign="middle"><p>Vitaminas para tu TT o proyecto Empresarial</p></td>
      <td valign="middle"><p>Julio Inclan</p></td>
      <td valign="middle"><p>IBM</p></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>13:25-13:40</strong></p></td>
      <td colspan="3" valign="middle" bgcolor="#999999"><p><strong>SERVICIO DE CAFETER&Iacute;A</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p>13:40-14:10</p></td>
      <td valign="middle"><p>Emprender: una alternativa real</p></td>
      <td valign="middle"><p>Raziel Rocha</p></td>
      <td valign="middle"><p>Ercom Technologies</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>14:10-14:40</p></td>
      <td valign="middle"><p>El posgrado : la visi&oacute;n de un estudiante telem&aacute;tico</p></td>
      <td valign="middle"><p>Luis Enrique Ramirez Chavez</p></td>
      <td valign="middle"><p>CINVESTAV-IPN</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>14:40-15:10</p></td>
      <td valign="middle"><p>Aplicaciones para google maps: servicios de localizaci&oacute;n con software libre</p></td>
      <td valign="middle"><p>Rafael Olvera</p></td>
      <td valign="middle"><p>Coconut y MapData</p></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>15:10-16:00</strong></p></td>
      <td colspan="3" valign="middle" bgcolor="#999999"><p><strong>SERVICIO DE ALIMENTOS Y REFRESCOS</strong>&nbsp;</p></td>
    </tr>
    <tr>
      <td valign="middle"><p>16:00-18:00</p></td>
      <td colspan="3" valign="middle"><p>TALLERES (SIMULT&Aacute;NEOS)</p></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<?php
include 'footer.php';
?>