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
           	  <table>
                <?php
		     $server="localhost";
                    $database = "labcomputo_BD";
                    $db_user = "root";
                    $db_pass = "labmovil";
                    $conn = mysql_connect($server, $db_user, $db_pass) or die ("error1:".mysql_errno().mysql_erro());
                    mysql_select_db($database) or die ("error2".mysql_error());
                    @mysqli_query("SET NAMES 'utf8'");

                    $cur = mysql_query("SELECT * FROM labcomputo_BD.talleres2014CITELC");
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
