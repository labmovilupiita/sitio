<?php
//session_start();
$titulo = "Relacion";
include 'header_min.php';
?>
<div id="dialog" title="Detalle">
  <p></p>
</div>

</head>

<body oncontextmenu="return false">
	<div id="wrapper">
    <div id="main">
    <div id="title">
    <? echo $titulo; ?>
    </div>
    	<div id="form">
	
	<div id="messages">
	<br>
    <br>
    <br>
	</div>

        <p align="center">Por favor, llena los siguientes campos:</p><br>
            <table>
                <?php
		     $server="localhost";
                    $database = "labcomputo_BD";
                    $db_user = "root";
                    $db_pass = "labmovil";
                    $conn = mysql_connect($server, $db_user, $db_pass) or die ("error1:".mysql_errno().mysql_erro());
                    mysql_select_db($database) or die ("error2".mysql_error());
                    @mysqli_query("SET NAMES 'utf8'");

                    $cur = mysql_query("SELECT * FROM labcomputo_BD.talleres2014");
                    echo '<tr><br><br><br>';
                    //echo '<td align="left"> </td>';
                    echo '<td align="left">TALLER</td>';
                    //echo '<td align="left">DESCRIPCIÓN</td>';
                    //echo '<td align="left">FECHA</td>';
                    echo '<td align="left">INSCRITOS</td>';
                    echo '<td align="left">CAPACIDAD</td>';
                    echo '</tr>';

                    while($fila = mysql_fetch_array($cur)){
                        echo '<tr>';
                        //echo '<td><input name="taller[]" type="checkbox" value="'.$fila['id'].'"/> ';
                        echo '<td>'.$fila['nombre'].'</td>';
                        //echo '<td style="font-size: 9px">'.$fila['descripcion'].'</td>';
                        //echo '<td>'.$fila['fecha'].'</td>';
                        echo '<td>'.$fila['inscritos'].'</td>';
                        echo '<td>'.$fila['capacidad'].'</td>';
                        echo '</tr>';
                    }


                ?>
             </table>

<?php
include 'footer.php';
?>
