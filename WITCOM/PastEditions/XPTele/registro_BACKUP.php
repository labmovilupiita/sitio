<?php
//session_start();
$titulo = "Registro";
include 'header_min.php';
include 'myscon.ajs.php';
?>
<div id="dialog" title="Detalle">
  <p></p>
</div>
<script>

  $(document).ready(function(){

		
	
	   $.ajaxSetup({ cache: false }); // -- Evita que la respuesta se gurade en cache				

	       $( "#progressbar" ).progressbar({
		      value: false
		    });
		    $( "button" ).on( "click", function( event ) {
		      var target = $( event.target ),
			progressbar = $( "#progressbar" ),
			progressbarValue = progressbar.find( ".ui-progressbar-value" );
		 
		      if ( target.is( "#numButton" ) ) {
			progressbar.progressbar( "option", {
			  value: Math.floor( Math.random() * 100 )
			});
		      } else if ( target.is( "#colorButton" ) ) {
			progressbarValue.css({
			  "background": '#' + Math.floor( Math.random() * 16777215 ).toString( 16 )
			});
		      } else if ( target.is( "#falseButton" ) ) {
			progressbar.progressbar( "option", "value", false );
		      }
		    });	

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
                                    
				    //alert($("#constancia").val());
				    var ponencias = $('.ponencias:checked').map(function(i,n) {
									        return $(n).val();
							    }).get();
				    // -- ENCODING DE LAS PRIORIDAD	
				    for (var i = 0; i < ponencias.length; i++) {
					ponencias[i] =   ponencias[i]+'-'+$("#prior_"+ponencias[i]).val();
					    	
					}		
					
				$.ajax({
					type: "POST",
					url: "insert_registro.php",
					data: 
					{boleta: $("#boleta").val(),
					ife:$("#ife").val(),
					nombre:$("#nombre").val(),
					apellidos:$("#apellidos").val(),
					email:$("#email").val(),
					plan:$("[name='plan']:checked").val(),
					vplan:$("#vplan").val(),
					nplan:$("#nplan").val(),
                    constancia:$("[name='constancia']:checked").val(),
					'ponencias[]':ponencias
					},
					success: callback
					});
					
				var focalizar = $("div#messages").position().top;
				$('html,body').animate({scrollTop: focalizar}, 1000);
		});
                
                

});	


function show_ponencia(id){
    $("div#dialog").dialog ({
        open : function (event)
        {
          $(this).load ("ponente.php?id="+id);
        }
    });
};

function callback(data, status)
					{
					var obj = jQuery.parseJSON(data);
					$("#messages").addClass(obj.type);
					$("#messages").html(obj.message);
					}	              

  function viejo(booleano) {
		var vpl = document.getElementById("vplan");
		var npl = document.getElementById("nplan");
		var tv = document.getElementById("tv");
		var tn = document.getElementById("tn");
		vpl.style.visibility = 'hidden'; 
		npl.style.visibility = 'hidden'; 
		vpl.style.visibility = 'visible';
		npl.style.visibility = 'hidden';
		tv.style.visibility = 'visible';
		tn.style.visibility = 'hidden';
  }
  function nuevo(booleano) {
		var vpl = document.getElementById("vplan");
		var npl = document.getElementById("nplan");
		var tv = document.getElementById("tv");
		var tn = document.getElementById("tn");
		vpl.style.visibility = 'hidden'; 
		npl.style.visibility = 'hidden'; 
		vpl.style.visibility = 'hidden';
		npl.style.visibility = 'visible';  
		tn.style.visibility = 'visible';
		tv.style.visibility = 'hidden';
  }
  function egresado(booleano) {
		var vpl = document.getElementById("vplan");
		var npl = document.getElementById("nplan");
		var tv = document.getElementById("tv");
		var tn = document.getElementById("tn");
		npl.style.visibility = 'hidden';
		vpl.style.visibility = 'hidden';  
		tn.style.visibility = 'hidden';
		tv.style.visibility = 'hidden';
  }           

function unCheckRadio(btngrp)   
{     
    if(btngrp.length) {
		if( btngrp[0].checked == true ) {  
			btngrp[0].checked = false;  
	}  
    }  
    else {    
        if( btngrp.checked == true )  
            btngrp.checked == false;  
    }  
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

        <p align="center">Por favor, llena los siguientes campos:</p><br>
        <form method="post" action="" >
        
        	<table width="99%" cellpadding="5">
                <tr>
                	<td align="left">No. de Boleta:</td>
                    <td colspan="3" align="left"><input type="text"  size="12" autofocus name="boleta"  id="boleta" /></td>
                    </tr>
                <tr>
    <td align="left">CURP:</td>
                    <td colspan="3" align="left"><input type="text" required size="40" autofocus name="ife" id="ife"/></td>
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

		 <td align="left">¿Solicita constancia de asistencia?:</td>	
                    <td align="center" width="20%">
                    <input type="radio" name="constancia"  value="1" required  /> Sí</td>
		    <td align="center" width="30%">
                    <input type="radio" name="constancia"  value="0" required  /> No</td>
                </tr>
                <tr>

		 <td align="left">Plan de estudios:</td>	
                    <td align="center" width="20%">
                    <input type="radio" name="plan"  value="e" required onClick="egresado(this)" /> Egresado</td>
		    <td align="center" width="30%">
                    <input type="radio" name="plan"  value="i" required onClick="egresado(this)" /> Invitado</td>
                </tr>

		<tr>
               	
  		<td></td>
                    <td width="20%" align="center"><input type="radio" name="plan" value="v" required onClick="viejo(this)" /> 1998 
                    </td>
                    <td align="center" width="20%">
                    <input type="radio" name="plan"    value="n" required onClick="nuevo(this)" /> 2009</td>

                </tr>
                <tr>
                	<td align="left"> </td>
                    <td width="30%" align="center">
                    <div id="tv" style="visibility: hidden">Semestre</div>
                    <select name="vplan" id="vplan" required style="visibility: hidden; width: 70px">
                    	<option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                    </td>
                    <td width="30%" align="center">
                    <div id="tn" style="visibility: hidden">Porcentaje de Avance</div>
                    <select name="nplan" id="nplan" style="visibility: hidden; text-align:right; width: 70px">
                    	<option value="1">10 %</option>
                        <option value="2">20 %</option>
                        <option value="3">30 %</option>
                        <option value="4">40 %</option>
                        <option value="5">50 %</option>
                        <option value="6">60 %</option>
                        <option value="7">70 %</option>
                        <option value="8">80 %</option>
                        <option value="9">90 %</option>
                        <option value="10">100 %</option>
                    </select></td>
                    <td></td>
                </tr>
             </table>
             <h4>Eventos que me interesan: </h4>
             <p> Marque las exposiciones a las que desee asistir y de &eacutestas indique del 1 al 10, el grado de interes (10 = total interes, ..., 1 = muy poco interes)</p>
             <?php
			 $cur = mysql_query("Select ponencia, id, empresa, taller 
			 from ponentes where adm_activa = 1 order by id ");
			 while($fila = mysql_fetch_array($cur)){
			   echo '<input name="ponencias[]" class="ponencias" type="checkbox" value="'.$fila['id'].'" />';
			   echo '<select  id="prior_'.$fila['id'].'"  width: 70px">
				<option>10</option>
		                <option>9</option>
		                <option>8</option>
		                <option>7</option>
		                <option>6</option>
		                <option>5</option>
		                <option>4</option>
		                <option>3</option>
		                <option>2</option>
		                <option>1</option>
	                    </select>';
			echo '<b>'.
			     (($fila['taller']=='1')?'[Taller] ':'[Ponencia] ').
			     $fila['ponencia'].'</b> ('.$fila['empresa'].')<a onclick="show_ponencia('.$fila['id'].');"> Info</a><br />';
				 }
			 ?>
             
             <br><br>
             <center><input type="button" value="Confirmar" id="btn_registra"></center>
             </form>


<?php
include 'footer.php';
?>
