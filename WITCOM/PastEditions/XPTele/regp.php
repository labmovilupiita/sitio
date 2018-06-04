<?php
$titulo = "&iquestC&oacutemo ser ponente?";
include 'header_min.php';
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Si quieres participar como ponente en <strong>los futuros Congresos de eXperiencias&nbsp;Telem&aacute;ticas</strong>, s&oacutelo llena el siguiente formulario y agendaremos tu ponencia y taller para el proximo evento. ¡Gracias por tu interes!</p>
<p>Tambien puedes enviar un correo al Coordinador general: Dr. Miguel Felix Mata Rivera: migfel@gmail.com</p>
<table width="90%">
<tr>
	<td width="30%">Nombre</td>
	<td><input type="text" name="nombre" id="nombre" size="40" autofocus required/></td>
</tr>
<tr>
	<td width="30%">Email</td>
	<td><input type="text" name="email" id="email" size="40" required/></td>
</tr>
<tr>
    <td width="30%">Año de egreso</td>
	<td><input type="text" name="anio" id="anio" size="40" required/></td>
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
	<td width="30%">Empresas o trabajos en los que has laborado</td>
	<td><textarea name="empresas" id="empresas" rows="4" cols="40"></textarea></td>
</tr>
<tr>
	<td width="30%">Posibles temas o l&iacuteneas que abordar&iacutea su ponencia</td>
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