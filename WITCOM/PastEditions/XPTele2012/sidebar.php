             </div>

        </div>
        <div id="right">
        <div id="sidebar">
		<?php
        if(isset($_SESSION['ingreso']) && $_SESSION['ingreso'] == "LOGGED"){		// Menú que verán los ponentes
            ?>
            <center>Men&uacute; de Ponentes</center>
            <hr />
            <ul>
            <li><a href="menu.php">Inicio</a></li>
            <li><a href="listar.php">Listado de Ponentes</a></li>
            <li><a href="programa.php">Programa</a></li>
            <li><a href="talleres.php">Talleres</a></li>
            <li><a href="index.php">Salir</a></li>
            </ul>
            <?php
        }
        else{										// Menú que verán los usuarios
        ?>
            <ul>
            <li><a href="index.php">Inicio</a></li>
            <ul>
            <li><a href="registro.php">Registro</a></li>
            <li><a href="registrados.php">Recuperar ID</a></li>
            <li><a href="programa.php">Programa</a></li>
            <li><a href="talleres.php">Talleres</a></li>
            <li><a href="ponentes.php">Ponentes</a></li>
            </ul>
            
            <li><a href="http://www.labcomputomovil.com" target="_blank">Lab. C&oacute;mputo M&oacute;vil</a></li>
            <li><a href="comite.php">Comit&eacute; Organizador</a></li>
            <li><a href="rponencia.php">Sitio Ponentes</a></li>
            </ul>
         <center>
         <a href="http://www.facebook.com/congresotelematica.upiita" target="_blank"><img src="images/facebook_32.png" /></a>&nbsp;&nbsp;&nbsp;
         <a href="https://twitter.com/#!/XpTelematicas" target="_blank"><img src="images/twitter_32.png" /></a>
         </center>
        <? } ?>
        
        </div>
        <div id="lcm">
        <p>
        <strong>Laboratorio de cómputo móvil</strong><br />
        <a href="http://www.labcomputomovil.com" target="_blank">www.labcomputomovil.com</a><br />
          Tel: 57296000 ext. 56900 y 56940<br /><small>
          Av. Instituto Politécnico Nacional 2580<br />Barrio  la  Laguna  Ticomán<br />
        Delegación Gustavo A. Madero<br /> CP. 07340 México D.F</small></p>
        </div>

</div>