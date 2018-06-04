<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>CITELC 2014</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link href='images/logo3v.png' rel='shortcut icon' type='image/x-icon'>

<script language="JavaScript" SRC="js/banner.js"></script>

<style type="text/css">
.uno {text-align: center;
}
.uno {text-align: center;
}
</style>
</head>
<body >

<div id="wrapper">
	<div id="header" class="container">
		
		<div id="banner"><img src="images/logo banner.png" alt="" width="958" height="149" border="0" id="banner_images"/></div>   
        
	</div>
	<div id="menu" class="container">
		<ul>
					<li><a href="index.html">Conference</a></li>
			<li><a href="papers.html" >Call for papers</a></li>
			<li><a href="organizers.html">Organizers</a></li>
            <li ><a href="submit.html">Submit a paper</a></li>
            <li><a href="reviewers.html">Reviewers</a></li>
			<li ><a href="program.html">Program</a></li>
			<li class="active"><a href="registration.html">Registration</a></li>
          <li><a href="location.html">Location</a></li>            
            <li><a href="pevents.html">Previous Events </a></li>
		</ul>
	</div>
	<div id="top-bar" class="container">
		<div class="bar">
			<div class="text">First International Congress on Telematics, Computing and Communications (CITELC 2014)</div>
		</div>
	</div>
	<div id="page" class="container">
		<div id="content">
			<div class="content">
           	  <p align="center">BIENVENIDO AL REGISTRO DE TALLERES</p>
           	  <p align="center">ES REQUISITO ASISTIR AL MENOS A DOS DE LAS PLÁTICAS DEL CONGRESO PARA PODER INGRESAR AL TALLER</p>
           	  <p align="center">(HABRÁ UNA MESA DE REGISTRO DISPONIBLE DURANTE TODAS LAS PLÁTICAS DONDE PODRÁS REGISTRAR TU ASISTENCIA A LAS PLÁTICAS)           	  </p>
           	  <p align="center">DUDAS O COMENTARIOS AL CORREO: citelc.upiita@ipn.mx</p>
<p align="center">Por favor, llena los siguientes campos:<font color="green"> (únicamente aparecen los talleres que aun tiene disponibilidad, si un taller no aparece es porque ya se agotaron los lugares)<font></p>
                	<br>
        <form method="post" action="insert_reg.php" >
        
        	<table width="99%" cellpadding="5">
                
                <tr>
    <td align="left">Procedencia:</td>
                    <td colspan="3" align="left"><input type="text" required size="40" autofocus name="procedencia" id="procedencia"/></td>
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
                                    $result=mysql_query("Select id,nombre from talleres2014CITELC where inscritos<capacidad", $conn);
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


</div>         
             
      <p>Sponsored by</p>
            
            <table align="center" border="0" width="503">
              <tr>
                <td width="405" align="center"><table width="417" border="0">
                  <tr>
                    <td><div align="center"></div></td>
                    <td><span class="uno"><img src="images/flayer.jpg" width="582" height="147" alt="patrocinadores" /></span></td>
                    <td><div align="center"></div></td>
                    </tr>
                </table></td>
              </tr>
              
            </table>
		
				
			
		</div>
		<div id="sidebar">
			<ul>
				<li>
				  <h2>News</h2>
			  </li>
                <li>The Program has been posted.</li>
                <li>&nbsp;</li>
                <li><font color="red">IMPORTANT: Registration for workshops </font> <a href= http://www.citelc.upiita.ipn.mx/registration.html>here</a></a>.</li>
                <li> </li>
                <li>
                  <p></p>
                </li>
                <li>
                  <h2>Important Dates</h2>
                  <ul>
                      <ul>
                        <li><strong>Abstract Submission </strong><strike><u>June 10</u></strike> June 18, 2014 (Midnight PT)</li>
                        <li><strong>Full Paper Submission</strong></li>
                        <li><strike><u>June 22</u></strike> June 28, 2014 (Midnight PT)</li>
                        <li><strong>Notification of Acceptance</strong></li>
                        <li>July  21, 2014                  </li>
                      </ul>
                  </ul>
                </li>
          <li></li><li><ul><li>
                    </li>
                  </ul>
                </li>
                <li><ul><li>
				  </li>
				  </ul>
				</li>
			</ul>
</div>
	  <div class="clearfix">&nbsp;</div>
		<div id="footer-bar" class="two-cols"><em>For more information, please <a href="mailto:citelc.upiita@ipn.mx">Contact us</a>.</em></div>
  </div>
</div>
<div id="footer" class="container">
	<p>(c) 2014 Design by Miguel Martinez (Child)</p>
</div>
</body>
</html>
