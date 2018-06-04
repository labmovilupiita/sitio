<?php
session_start();
session_destroy();
$titulo = "&iquestC&oacutemo ser ponente?";
include 'header.php';
?>
<style type="text/css">
.unica {
	text-align: center;
}
.dos {
	text-align: center;
}
.uno {
	text-align: center;
}
.uno {
	text-align: center;
}
.dos {
	text-align: justify;
}
.uno a {
	text-align: center;
}
.uno a {
	text-align: center;
}
.dos a {
	text-align: center;
}
.tres {
	text-align: left;
}
</style>

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
                            url: "insert_regp.php",
                            data: 
                            {nombre:$("#nombre").val(),
                            email:$("#email").val(),
                            anio:$("#anio").val(),
                            especialidad:$("#especialidad").val(),
                            experiencia:$("#experiencia").val(),
                            empresas:$("#empresas").val(),
                            temas:$("#temas").val(),
                            talleres:$("#talleres").val()
                            },
                            success: callback
                            });
		});
});	

function callback(data, status)
					{
					var obj = jQuery.parseJSON(data);
					$("#messages").addClass(obj.type);
					$("#messages").html(obj.message);
					}	              

</script>
<!--<hr />
<center>
  <h3>CONVOCATORIA AL 2do. Congreso de <strong>eXperiencias&nbsp;Telem&aacute;tica</strong>s 2013.</h3>
</center>
<hr />-->
<p>Si quieres participar como ponente en el 3er. Congreso de <strong>eXperiencias&nbsp;Telem&aacute;ticas</strong> a celebrarse en 2014, esta es tu oportunidad, s&oacutelo llena el siguiente formulario y evaluaremos tu situac&oacuten.</p>
</div>
    	<div id="form">
	
	<div id="messages">
	
	</div>    


<form method="post" action="regp.php">
<table width="90%">
<tr>
	<td width="30%">Nombre</td>
	<td><input type="text" name="nombre" id="nombre" size="40" autofocus required/></td>
</tr>
<tr>
	<td width="30%">Email</td>
	<td><input type="text" name="email" id="email" size="40" autofocus required/></td>
</tr>
<tr>
    <td width="30%">Año de egreso</td>
	<td><input type="text" name="anio" id="anio" size="40" autofocus required/></td>
</tr>
<tr>
	<td width="30%">Especialidad</td>
	<td><input type="text" name="especialidad" id="especialidad" size="40"  required/></td>
</tr>                          
<tr>
	<td width="30%">Perfil de experiencia laboral</td>
	<td><textarea name="experiencia" id="experiencia" rows="4" cols="40"></textarea></td>
</tr>

<tr>
	<td width="30%">Empresas o trabajos en los que ha laborado</td>
	<td><textarea name="empresas" id="empresas" rows="4" cols="40"></textarea></td>
</tr>
<tr>
	<td width="30%">Posibles temas o lineas que abordaria su ponencia</td>
	<td><textarea name="temas" id="temas" rows="4" cols="40"></textarea></td>
</tr>
<tr>
	<td width="30%">Posibles talleres a impartir</td>
	<td><textarea name="talleres" id="talleres" rows="4" cols="40"></textarea></td>
</tr>
</table>
<br/><br/>
<center>
<input type="button" id="btn_registra" value="Enviar" />
</center></form>
<?php
include 'footer.php';
?>
