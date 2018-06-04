
</head>

<body>
	<div id="wrapper">
    <div id="main">
    <div id="title">
    <? echo $titulo; ?>
    </div>
    	<div id="form">
	
	<div id="messages">
	
	</div>
<center>
<h2>Inicio de Sesión</h2>
<form name="login_ponente" action="consulta_regp.php" method="post" autocomplete="off">
	<table width="40%" border="0">
	<tr>
	<td><strong>Usuario:</strong></td>
	<td><input type="text" name="mail" id="mail" size="20" />
		<input type="hidden" name="action" id="action" value="login" />
	</td>
	</tr>
	<tr>
	<td><strong>Contrase&ntilde;a:</strong></td>
	<td><input type="password" name="pass" id="pass" size="20" /></td>
	</tr>
	<tr>
	<td></td><td>
	<input type="submit" value="Ingresar" id="btn_ingresar"</td></tr></table>
</form>
</center>
 

<?php
include 'footer.php';
?>
