<?php include("../database.php")?>
<?php

	$id = $_GET['profesor'];
	$con = Conectarse();

	$sql="SELECT * FROM profesor WHERE id = ".$id;

	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	  {
	  	echo '<div class="pure-g">';
        echo '<div class="pure-u-1-3">';
        echo '<label for="nombrem">Nombre</label>';
        echo '<input id="nombrem" name="nombre" value="'.$row['nombre'].'" style="width: 90%;" required>';
        echo '</div>';

    	echo '<div class="pure-u-1-3">';
        echo '<label for="apaternom">Apellido paterno</label>';
        echo '<input id="apaternom" name="apaterno" value="'.$row['apellidopaterno'].'" style="width: 90%;" required>';
        echo '</div>';

        echo '<div class="pure-u-1-3">';
        echo '<label for="amaternom">Apellido materno</label>';
        echo '<input id="amaternom" name="amaterno" value="'.$row['apellidomaterno'].'" style="width: 90%;" required>';
        echo '</div>';
   		echo '</div>';
    	echo '<div class="pure-g">';
        echo '<div class="pure-u-1-3">';
        echo '<label for="correom">Correo electr&oacute;nico</label>';
        echo '<input id="correom" name="correo" type="email" value="'.$row['correo'].'" style="width: 90%;" required>';
        echo '</div>';

    	echo '<div class="pure-u-1-3">';
        echo '<label for="passm">Password</label>';
        echo '<input id="passm" name="pass" value="'.$row['password'].'" style="width: 90%;" required>';
        echo '</div>';
   		echo '</div>';
	  }

?>
