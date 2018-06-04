<?php
session_start();
$titulo = "Programa";
include 'header_min.php';
include 'myscon.ajs.php';
$cons = mysql_query("SELECT id, hora, nombre, ponencia, empresa, resumen from ponentes ORDER BY hora") or die(mysql_error());

?>
<div id="dialog" title="Detalles">
  <p></p>
</div>
<script>

	function show_ponencia(id){
  	  	$("div#dialog").dialog ({
    	    open : function (event)
        	{
       		   $(this).load ("ponente.php?id="+id);
        	}
    	});
	};

</script>

</head>

<body>
	<div id="wrapper">
    <div id="main">
    <div id="title">
    <? echo $titulo; ?>
    </div>
    	<div id="form">
	

<p align="center"><strong>Programa de conferencias Experiencias Telematicas.</strong></p>
<p align="center"><strong>Sabado 15 de junio 2013, 9:00 - 18:00 hrs</strong></p>
<table width="100%" border="1" bordercolor="#EEEEEE"  bgcolor="#FAFAFA" cellpadding="3" cellspacing="0">
  <tbody>
    <tr bgcolor="#CCCCCC">
      <td width="20%" valign="middle" align="center" bgcolor="#999999"><strong>Horario</strong></td>
      <td width="25%" valign="middle" bgcolor="#999999"><p><strong>Titulo</strong></p></td>
      <td width="20%" valign="middle" bgcolor="#999999"><p><strong>Ponente</strong></p></td>
      <td width="15%" valign="middle" bgcolor="#999999"><p><strong>Empresa</strong></p></td>
      <td width="20%" valign="middle" bgcolor="#999999"><p><strong>Descripci&oacuten</strong></p></td>
    </tr>
    <!--<tr>
      <td valign="middle"><p><strong>8:00-9:00</strong></p></td>
      <td colspan="3" valign="middle"><p><strong>REGISTRO, SERVICIO DE CAFE Y BOCADILLOS</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p>9:00-9:10</p></td>
      <td colspan="3" valign="middle"><p>Inauguraci&oacute;n (Director UPIITA)</p></td>
    </tr>-->
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>8:00-9:00</strong></p></td>
      <td colspan="4" valign="middle" bgcolor="#999999"><p><strong>Registro y Servicio de caf&eacute</strong></p></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>9:00-9:10</strong></p></td>
      <td colspan="4" valign="middle" bgcolor="#999999"><p><strong>Inauguraci&oacuten Director UPIITA</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p>9:10-9:40</p></td>
      <td valign="middle"><p>Un telem&aacutetico emprendedor: &iquestC&oacutemo lograrlo?</p></td>
      <td valign="middle"><p>Juan Luis Soberanes</p></td>
      <td valign="middle"><p>Emprendedores</p></td>
      <td valign="middle"><a onclick="show_ponencia('15');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle"><p>9:40-10:10</p></td>
      <td valign="middle"><p>El ingeniero, &iquestTan s&oacutelo una herramienta?</p></td>
      <td valign="middle"><p>David Valencia</p></td>
      <td valign="middle"><p>Huawei Technologies</p></td>
      <td valign="middle"><a onclick="show_ponencia('4');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle"><p>10:10-10:40</p></td>
      <td valign="middle"><p>Telem&aacutetico: Copa de nada con sabor a todo</p></td>
      <td valign="middle"><p>Armando Becerra</p></td>
      <td valign="middle"><p>IFAI, Instituto Federal de Acceso a la Informacion y Proteccion de Datos</p></td>
      <td valign="middle"><a onclick="show_ponencia('8');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle"><p>10:40-11:10</p></td>
      <td valign="middle"><p>La experiencia laboral en el &aacuterea de la fibra &oacuteptica</p></td>
      <td valign="middle"><p>Alfredo Romero</p></td>
      <td valign="middle"><p>SOITSA</p></td>
      <td valign="middle"><a onclick="show_ponencia('20');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>11:10-11:25</strong></p></td>
      <td colspan="4" valign="middle" bgcolor="#999999"><p><strong>SERVICIO DE CAFETER&Iacute;A</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p>11:25-11:55</p></td>
      <td valign="middle"><p>La capacitaci&oacuten en Jap&oacuten</p></td>
      <td valign="middle"><p>Carlos Anaya</p></td>
      <td valign="middle"><p>Heur&iacutestica Soluciones S.A. de C.V.</p></td>
      <td valign="middle"><a onclick="show_ponencia('2');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle"><p>11:55-12:25</p></td>
      <td valign="middle"><p>&iquestQu&eacute es la geotelem&aacutetica?</p></td>
      <td valign="middle"><p>Vladimir Luna e Imelda Escamilla</p></td>
      <td valign="middle"><p>CIC IPN</p></td>
      <td valign="middle"><a onclick="show_ponencia('9');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle"><p>12:25-12:55</p></td>
      <td valign="middle"><p>La Econom&iacutea de un ingeniero.</p></td>
      <td valign="middle"><p>Gonzalo Galicia</p></td>
      <td valign="middle"><p>GBM (Grupo Burs&aacutetil Mexicano)</p></td>
      <td valign="middle"><a onclick="show_ponencia('3');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle"><p>12:55-13:25</p></td>
      <td valign="middle"><p>Redes celulares y IMS: La visi&oacuten de un telem&aacutetico</p></td>
      <td valign="middle"><p>Nicolas Pineda</p></td>
      <td valign="middle"><p>Ericsson</p></td>
      <td valign="middle"><a onclick="show_ponencia('5');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>13:25-13:40</strong></p></td>
      <td colspan="4" valign="middle" bgcolor="#999999"><p><strong>SERVICIO DE CAFETER&Iacute;A</strong></p></td>
    </tr>
    <tr>
      <td valign="middle"><p>13:40-14:10</p></td>
      <td valign="middle"><p>El rol del telem&aacutetico en proyectos multidisciplinarios</p></td>
      <td valign="middle"><p>Fernando Copado</p></td>
      <td valign="middle"><p>CNS (Comisi&oacuten Nacional de Seguridad)</p></td>
      <td valign="middle"><a onclick="show_ponencia('11');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
      <td valign="middle"><p>14:10-14:40</p></td>
      <td valign="middle"><p>Nextel Evolution - Implementaci&oacuten de una red nacional de telefon&iacutea m&oacutevil</p></td>
      <td valign="middle"><p>Luis Enrique Bustos</p></td>
      <td valign="middle"><p>Huawei Technologies</p></td>
      <td valign="middle"><a onclick="show_ponencia('6');">Ver m&aacutes ...</a></td>
    </tr>
    <tr>
	  <td valign="middle"><p>14:40-15:10</p></td>
      <td valign="middle"><p>Hello [cruel] world, //primero pasos en la vida laboral.</p></td>
      <td valign="middle"><p>Arturo Garc&iacutea</p></td>
      <td valign="middle"><p>YellowPepper</p></td>
      <td valign="middle"><a onclick="show_ponencia('19');">Ver m&aacutes ...</a></td>
    </tr>
    <!--<tr>
      <td valign="middle"><p>14:10-14:40</p></td>
      <td valign="middle"><p>Camel, El ESB ligero, integrando tu proyecto</p></td>
      <td valign="middle"><p>Antonio Gonz&aacutelez</p></td>
      <td valign="middle"><p>Sintegra S.A. de C.V.</p></td>
      <td valign="middle"><p>Este taller es una introducci&oacuten a Maven, Camel IF, a los patrones de integraci&oacuten, aprendizaje v&iacutea test y ejemplos para aderezar tus proyectos mediante la tecnolog&iacutea de integraci&oacuten.</p></td>
    </tr>-->
    <!--<tr>
      <td valign="middle"><p>14:40-15:10</p></td>
      <td valign="middle"><p>Ponencia 11</p></td>
      <td valign="middle"><p>Ponente 11</p></td>
      <td valign="middle"><p>Empresa 11</p></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>15:10-16:00</strong></p></td>
      <td colspan="3" valign="middle" bgcolor="#999999"><p><strong>SERVICIO DE ALIMENTOS Y REFRESCOS</strong>&nbsp;</p></td>
    </tr>-->
    <tr>
      <td valign="middle" bgcolor="#999999"><p><strong>16:00-18:00</strong></p></td>
      <td colspan="4" valign="middle" bgcolor="#999999"><p><strong>TALLERES (SIMULT&Aacute;NEOS)</strong></p></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</form>
<?php
include 'footer.php';
?>