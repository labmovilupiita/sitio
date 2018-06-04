<?php
$titulo = "Registro";
include 'header_min.php';
?>
<div id="dialog" title="Detalle">
  <p></p>
</div>

<body>
	<div id="wrapper">
    <div id="main">
    <div id="title">
    <?php echo $titulo; ?>
    </div>
    	<div id="form">
	
	<div id="messages">
	
	</div>

        <p align="center">Por favor, llena los siguientes campos:</p><br>
        <form method="post" action="insert_reg.php" >
        
        	<table width="99%" cellpadding="5">
                <tr>
                	<td align="left">Procedencia:</td>
                    <td colspan="3" align="left"><input type="text"  size="40" autofocus name="procedencia"  id="procedencia" /></td>
                </tr>
                <tr>
    <td align="left">CURP:</td>
                    <td colspan="3" align="left"><input type="text" required size="40" autofocus name="curp" id="curp"/></td>
                    </tr>

                    <tr>
                	<td width="40%" align="left">Nombre:</td>
                    <td colspan="3"><input type="text" required size="40"  name="nombre" id="nombre"/></td>
                </tr>
                <tr>
                	<td align="left">Apellidos:</td>
                    <td colspan="3"><input type="text" required size="40" name="apellidos" id="apellidos"/></td>
                </tr>
                <tr>
                	<td align="left">Correo Electrónico:</td>
                    <td colspan="3"><input type="email" placeholder="correo@email.com" size="40" name="email"  id="email" required/></td>
                </tr>
                <tr>
                    <td aling="left">Taller</td>
                    <td colspan="3">
                                <?php 
                                    $server="localhost";
                                    $database = "labcomputo_BD";
                                    $db_user = "root";
                                    $db_pass = "labmovil";
                                    $conn = mysql_connect($server, $db_user, $db_pass) or die ("error1:".mysql_errno().mysql_error());
                                    mysql_select_db($database) or die ("error2".mysql_error());
                                    @mysqli_query("SET NAMES 'utf8'");
                                    $result=mysql_query("Select id,nombre from talleres2014 where inscritos<capacidad", $conn);
                                    echo '<select name="talleres" id="talleres">'; 
                                    while ($row=mysql_fetch_row($result)) 
                                    { 
                                    echo "<option value=".$row[0].">".$row[1]."</option>\n"; 
                                    } 
                                    echo "</select>";
                                ?> 
                    
                    </td>
                </tr>

                
             </table>
             

 
             <br><br>
             <center><input type="submit" value="Confirmar" id="btn_registra"></center>
             </form>



<?php
include 'footer.php';
?>
