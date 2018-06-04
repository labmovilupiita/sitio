<?php
session_start();
$titulo = "Actualización de registro.";
include 'myscon.ajs.php';
include 'libs/util.php';

if($_POST['action'] == 'login'){
	if(authenticateUser($_POST[usuario], $_POST[pass])){
	  $usr_array = explode('_',trim($_POST[usuario]));
	  $_SESSION['user_id'] = $usr_array[1];
	}	
}

if($_POST['action'] == 'update'){

	include "update_registro.php";
}

include 'header_min.php';



if(!isset($_SESSION['user_id'])){
	include "login_usuario.php";
	exit();
}



$cons = mysql_query("SELECT * from auditorio where id_usuario = $_SESSION[user_id]");
$row = mysql_fetch_array($cons);
?>

<div id="dialog" title="Detalle">
  <p></p>
</div>
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
				    
				    var ponencias = $('.ponencias:checked').map(function(i,n) {
									        return $(n).val();
							    }).get();
				    // -- ENCODING DE LAS PRIORIDAD	
				    for (var i = 0; i < ponencias.length; i++) {
					ponencias[i] =   ponencias[i]+'-'+$("#prior_"+ponencias[i]).val();
					    	
					}		
					
				$.ajax({
					type: "POST",
					url: "consulta_registro.php",
					data: 
					{boleta: $("#boleta").val(),
					ife:$("#ife").val(),
					nombre:$("#nombre").val(),
					apellidos:$("#apellidos").val(),
					email:$("#email").val(),
					plan:$("[name='plan']:checked").val(),
					vplan:$("#vplan").val(),
					nplan:$("#nplan").val(),
					'ponencias[]':ponencias,
                                         constancia:$("[name='constancia']:checked").val(),
					action:"update",
					id:<?php echo $_SESSION['user_id']?>
					},
					success: callback
					});
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
                    <td colspan="3" align="left"><input type="text"  size="12" 
			autofocus name="boleta"  id="boleta"  value="<? echo $row['boleta']?>" readonly/></td>
                    </tr>
                <tr>
    <td align="left">IFE (Clave de elector):</td>
                    <td colspan="3" align="left"><input type="text" required size="40" 
			autofocus name="ife" id="ife" value="<? echo $row['ife']?>" readonly/></td>
                    </tr>

                    <tr>
                	<td width="40%" align="left">Nombre:</td>
                    <td colspan="3"><input type="text" required size="40"  
		name="nombre" id="nombre"value="<? echo $row['nombre']?>"/></td>
                </tr>
                <tr>
                	<td align="left">Apellidos:</td>
                    <td colspan="3"><input type="text" required size="40" 
			name="apellidos" id="apellidos" value="<? echo $row['apellidos']?>"/></td>
                </tr>
                <tr>
                	<td align="left">Correo Electrónico:</td>
                    <td colspan="3"><input type="email" placeholder="correo@email.com" size="40" 
			name="email"  id="email" required  value="<? echo $row['email']?>"/></td>
                </tr>
                                <tr>

		 <td align="left">¿Solicita constancia de asistencia?:</td>	
                    <td align="center" width="20%">
                    <input type="radio" name="constancia"  <? echo $row['constancia'] == '1'?'checked="checked"':""; ?>value="1" required  /> Sí</td>
		    <td align="center" width="30%">
                    <input type="radio" name="constancia"  <? echo $row['constancia'] == '0'?'checked="checked"':""; ?>value="0" required  /> No</td>
                </tr>
                <tr>

		 <td align="left">Plan de estudios:</td>	
                    <td align="center" width="20%">
                    <input type="radio" name="plan"  <? echo $row['plan'] == 'e'?'checked="checked"':""; ?>  value="e" required onClick="egresado(this)" /> Egresado</td>
		    <td align="center" width="30%">
                    <input type="radio" name="plan"  <? echo $row['plan'] == 'i'?'checked="checked"':""; ?> value="i" required onClick="egresado(this)" /> Invitado</td>
                </tr>

		<tr>
               	
  		<td></td>
                    <td width="20%" align="center"><input type="radio" name="plan"  <? echo $row['plan'] == 'v'?'checked="checked"':""; ?> value="v" required onClick="viejo(this)" /> 1998 
                    </td>
                    <td align="center" width="20%">
                    <input type="radio" name="plan"   <? echo $row['plan'] == 'n'?'checked="checked"':""; ?>  value="n" required onClick="nuevo(this)" /> 2009</td>

                </tr>
                <tr>
                	<td align="left"> </td>
                    <td width="30%" align="center">
                    <div id="tv" style="visibility: hidden">Semestre</div>
                    <select name="vplan" id="vplan" <? echo $row['plan'] == 'v'?'value="'.$row['avance'].'"':""; ?> required style="visibility: hidden; width: 70px">
                    	<option <? echo $row['plan'] == 'v' && $row['avance'] == 1 ?" selected ":""; ?>>1</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 2 ?" selected ":""; ?>>2</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 3 ?" selected ":""; ?>>3</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 4 ?" selected ":""; ?>>4</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 5 ?" selected ":""; ?>>5</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 6 ?" selected ":""; ?>>6</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 7 ?" selected ":""; ?>>7</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 8 ?" selected ":""; ?>>8</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 9 ?" selected ":""; ?>>9</option>
                        <option<? echo $row['plan'] == 'v' && $row['avance'] == 10 ?" selected ":""; ?>10</option>
                    </select>
                    </td>
                    <td width="30%" align="center">
                    <div id="tn" style="visibility: hidden">Porcentaje de Avance</div>
                    <select name="nplan" id="nplan" style="visibility: hidden; text-align:right; width: 70px">
                    	<option value="1" <? echo $row['plan'] == 'n' && $row['avance'] == 1 ?" selected ":""; ?>>10 %</option>
                        <option value="2" <? echo $row['plan'] == 'n' && $row['avance'] == 2 ?" selected ":""; ?>>20 %</option>
                        <option value="3" <? echo $row['plan'] == 'n' && $row['avance'] == 3 ?" selected ":""; ?>>30 %</option>
                        <option value="4" <? echo $row['plan'] == 'n' && $row['avance'] == 4 ?" selected ":""; ?>>40 %</option>
                        <option value="5" <? echo $row['plan'] == 'n' && $row['avance'] == 5 ?" selected ":""; ?>>50 %</option>
                        <option value="6" <? echo $row['plan'] == 'n' && $row['avance'] == 6 ?" selected ":""; ?>>60 %</option>
                        <option value="7" <? echo $row['plan'] == 'n' && $row['avance'] == 7 ?" selected ":""; ?>>70 %</option>
                        <option value="8" <? echo $row['plan'] == 'n' && $row['avance'] == 8 ?" selected ":""; ?>>80 %</option>
                        <option value="9" <? echo $row['plan'] == 'n' && $row['avance'] == 9 ?" selected ":""; ?>>90 %</option>
                        <option value="10" <? echo $row['plan'] == 'n' && $row['avance'] == 10 ?" selected ":""; ?>>100 %</option>
                    </select></td>
                    <td></td>
                </tr>
             </table><h4>Eventos que me interesan: </h4>
             <?php
			 $cur = mysql_query("Select ponencia, id, empresa, taller 
			 from ponentes where adm_activa = 1 order by id ");
			 while($fila = mysql_fetch_array($cur)){
			     $cur1 = mysql_query("Select prioridad  
			 from asistencia  where usuario = $_SESSION[user_id] and ponencia =".$fila['id']);	
			if(mysql_num_rows($cur1) > 0){
			  $fila1 = mysql_fetch_array($cur1);		
			   echo '<input name="ponencias[]" class="ponencias" type="checkbox"  checked="checked" value="'.$fila['id'].'" />';
			   echo '<select  id="prior_'.$fila['id'].'"  width: 70px">
				<option'.(($fila1['prioridad'] == 10)?" selected ":"").'>10</option>
		                <option'.(($fila1['prioridad'] == 9)?" selected ":"").'>9</option>
		                <option'.(($fila1['prioridad'] == 8)?" selected ":"").'>8</option>
		                <option'.(($fila1['prioridad'] == 7)?" selected ":"").'>7</option>
		                <option'.(($fila1['prioridad'] == 6)?" selected ":"").'>6</option>
		                <option'.(($fila1['prioridad'] == 5)?" selected ":"").'>5</option>
		                <option'.(($fila1['prioridad'] == 4)?" selected ":"").'>4</option>
		                <option'.(($fila1['prioridad'] == 3)?" selected ":"").'>3</option>
		                <option'.(($fila1['prioridad'] == 2)?" selected ":"").'>2</option>
		                <option'.(($fila1['prioridad'] == 1)?" selected ":"").'>1</option>
	                    </select>';
			echo '<b>'.
			     (($fila['taller']=='1')?'[Taller] ':'[Ponencia] ').
			     $fila['ponencia'].'</b> ('.$fila['empresa'].')<a onclick="show_ponencia('.$fila['id'].');"> Info</a><br />';
			}else{
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
		}
			 ?>
             
             <br><br>
             <center><input type="button" value="Actualiza" id="btn_registra"></center>
             </form>


<?php
include 'footer.php';
?>
