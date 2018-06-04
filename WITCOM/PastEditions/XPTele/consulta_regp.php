<?php
session_start();
$titulo = "Actualización de ponente.";
include 'myscon.ajs.php';
include 'libs/util.php';

if($_POST['action'] == 'login'){
	if(authenticatePonente($_POST[mail], $_POST[pass])){
	  $_SESSION['ponente_id'] = $_POST[mail];
	}	
}

if($_POST['action'] == 'update'){

	include "update_ponente.php";
}

include 'header_min.php';

if(!isset($_SESSION['ponente_id'])){
	include "login_ponente.php";
	exit();
}

$cons = mysql_query("SELECT * from ponentes where email = '$_SESSION[ponente_id]'");
$row = mysql_fetch_array($cons);
?>
<script>

  $(document).ready(function(){

		
	
	   $.ajaxSetup({ cache: false }); // -- Evita que la respuesta se gurade en cache				


        	/* AJAX start and stop events */
            $(document).ajaxStart(function() {    
                /* start progressbar modal */
                $('body').append('<div id="progressbar"></div><div id="progressShade"></div>');
                var modalMarginTop = ($('#progressbar').height()) / 2;
                var modalMarginLeft = ($('#progressbar').width()) / 2;
                /* apply the margins to the modal window */
                $('#progressbar').css({
                    'margin-top' : -modalMarginTop,
                    'margin-left' : -modalMarginLeft
                });
                $('#progressShade').css('opacity', '0.4');
                $( "#progressbar" ).progressbar({
                    value: 100
                });
                $('#progressbar, #progressShade').fadeIn(250);    
            });
            $(document).ajaxStop(function() {
                /* fade and remove progressbar */
                $('#progressbar, #progressShade').fadeOut(400, function(){
                    $('#progressbar, #progressShade').remove();
                });
            });

				$("#btn_registra").click(function(){
				$.ajax({
					type: "POST",
					url: "update_ponente.php",
					data: 
					{nombre:$("#nombre").val(),
					email:'<? echo $row['email']?>',
					evento:$("[name='evento']:checked").val(),
					action:"insert",
                                        empresa:$("#empresa").val(),
                                        palabra_cve:$("#palabra_cve").val(),
                                        resumen:$("#resumen").val(),
                                        taller_perfil:$("#taller_perfil").val(),
                                        taller_reqh:$("#taller_reqh").val(),
                                        taller_reqs:$("#taller_reqs").val(),
                                        titulo:$("#titulo").val()
					},
					success: callback
					});
		});
                
                $("#opt_taller").click(function(){
                   $(".opts_taller_c").show(); 
                });
                
                $("#opt_ponencia").click(function(){
                   $(".opts_taller_c").hide(); 
                });
                
        $('ul#tools').prepend('<a id="print_func" href="#print">[Imprimir]</a>');
	$('#print_func').click(function() {
		PrintElem('#form');
		return false;
	});
                
                
});	

function callback(data, status)
					{
					var obj = jQuery.parseJSON(data);
					$("#messages").addClass(obj.type);
					$("#messages").html(obj.message);
					}
                                        
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Consulta de información</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }                                        

</script>
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


<form method="post" action="regp.php" >
<table width="90%">
<tr>
	<td width="30%">Nombre</td>
	<td><input type="text" name="nombre" id="nombre" size="40" value="<? echo $row['nombre']?>" /></td>
</tr>
<tr>
    <td width="30%">Correo electr&oacute;nico:</td>
	<td><input type="text" name="email" id="email" size="40" value="<? echo $row['email']?>" readonly /></td>
</tr>
<tr>
	<td width="30%">Empresa</td>
	<td><input type="text" name="empresa" id="empresa" size="40"  value="<? echo $row['empresa']?>" required/></td>
</tr>
                <tr>

		 <td align="left">Evento:</td>	
                    <td align="left">
                    <input type="radio" id="opt_taller" name="evento" <? echo $row['taller'] == '1'?'checked="checked"':""; ?> value="1" required  /> Taller
                    <input type="radio" id="opt_ponencia" name="evento" <? echo $row['taller'] == '0'?'checked="checked"':""; ?> value="0" required  /> Ponencia</td>
                </tr>
                               
<tr class="opts_taller_c">
	<td width="30%">Perfil del alumno</td>
	<td><textarea name="taller_perfil" id="taller_perfil" rows="4" cols="40"><? echo $row['taller_perfil']?></textarea></td>
</tr>

<tr class="opts_taller_c">
	<td width="30%">Requerimientos de Hardware</td>
	<td><textarea name="taller_reqh" id="taller_reqh" rows="4" cols="40"><? echo $row['taller_reqh']?></textarea></td>
</tr>
<tr class="opts_taller_c">
	<td width="30%">Requerimientos de Software</td>
	<td><textarea name="taller_reqs" id="taller_reqs" rows="4" cols="40"><? echo $row['taller_reqs']?></textarea></td>
</tr>               
<tr>
	<td width="30%">Titulo</td>
	<td><input type="text" name="titulo" id="titulo" size="40" value="<? echo $row['ponencia']?>" required/></td>
</tr>
<tr>
	<td width="30%">Palabras clave</td>
	<td><input type="text" name="palabra_cve" id="palabra_cve" value="<? echo $row['clave']?>" size="40"  required/></td>
</tr>

<tr>
	<td width="30%">Resumen Ponencia</td>
	<td><textarea name="resumen" id="resumen" rows="12" cols="40"><? echo $row['resumen']?></textarea></td>
</tr>

<tr>
	<td width="30%">Hora de Inicio</td>
	<td><? echo (($row['adm_hora_inicio'] == NULL)?"No establecido al momento":$row['adm_hora_inicio'])?></td>
</tr>

<tr>
	<td width="30%">Hora de fin</td>
	<td><? echo (($row['adm_hora_fin'] == NULL)?"No establecido al momento":$row['adm_hora_fin'])?></td>
</tr>

<tr>
	<td width="30%">Lugar</td>
	<td><? echo (($row['adm_lugar'] == NULL)?"No establecido al momento":$row['adm_lugar'])?></td>
</tr>

</table>
<ul id="tools"></ul>
<br /><br />
<center>
    <input type="button" id="btn_registra" value="Enviar" />
</center></form>
<?php
include 'footer.php';
?>


