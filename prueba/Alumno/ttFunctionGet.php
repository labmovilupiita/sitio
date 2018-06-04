<?php include("../database.php")?>
<?php
	$proceso = $_GET['proceso'];

	class actividad {
	    public $titulo = "";
	    public $fechaentrega = "";
	    public $numero = "";
	}

	class tesis {
	    public $id = "";
	    public $url = "";
	}
	
	function consultarTT(){

		$con = Conectarse();
		$option = $_GET['optionsRadios'];
		$str = $_GET['str'];
		$flag = 0;
		switch ($option) {
			case 1:
				$sql="SELECT * FROM tt WHERE titulo = '".$str."'";
				$result = mysqli_query($con,$sql);

				while($row = mysqli_fetch_array($result))
				  {
				  $inicial = date("d-m-Y", strtotime($row['fechainicial']));
				  $final = date("d-m-Y", strtotime($row['fechafinal']));
				  echo "<tr><td style='display: none;'><p id='id". $row['id']."' name='id". $row['id']."'>".$row['id']."</p></td>";
				  echo "<td>".$row['titulo']."</td>";
				  echo "<td>".$inicial."</td>";
				  echo "<td>".$final."</td>";
				  echo "<td>".$row['totalreportes']."</td>";

				  $sql1="SELECT nombre, apellidopaterno, apellidomaterno FROM alumno WHERE id_tt = '".$row['id']."'";
				  $result1 = mysqli_query($con,$sql1);

				  echo "<td>";

				  $flag = 1;

				  while($row1 = mysqli_fetch_array($result1)){
				  	echo $row1['nombre']." ".$row1['apellidopaterno']." ".$row1['apellidomaterno']."<br>";

				  }
				  echo "</td>";

				  echo "<td><a href='edicionTT.php?id=".$row['id']."'><img src='images/pencil2.png' width='25' title='Editar'></a></td></tr>";
				  }
				break;
			case 2:
				$sql="SELECT * FROM alumno WHERE nombre = '".$str."' OR apellidopaterno = '".$str."' OR apellidomaterno = '".$str."'";
				$result = mysqli_query($con,$sql);

				while($row = mysqli_fetch_array($result))
				  {

				  $sql1="SELECT * FROM tt WHERE id = '".$row['id_tt']."'";
				  $result1 = mysqli_query($con,$sql1);

				  while($row1 = mysqli_fetch_array($result1)){
				  	  $inicial = date("d-m-Y", strtotime($row1['fechainicial']));
				  	  $final = date("d-m-Y", strtotime($row1['fechafinal']));
					  echo "<tr><td style='display: none;'><p id='id". $row1['id']."' name='id". $row1['id']."'>".$row1['id']."</p></td>";
					  echo "<td>".$row1['titulo']."</td>";
					  echo "<td>".$inicial."</td>";
					  echo "<td>".$final."</td>";
					  echo "<td>".$row1['totalreportes']."</td>";
				  	  echo "<td>".$row['nombre']." ".$row['apellidopaterno']." ".$row['apellidomaterno']."</td>";
					  echo "<td><a href='edicionTT.php?id=".$row1['id']."'><img src='images/pencil2.png' width='25' title='Editar'></a></td></tr>";
					  $flag = 1;
				  }
 
				  }
				break;
		}

		if($flag == 0){
			echo "<script>alert('No se ha encontrado su petición');</script>";
		}

		Cerrar($con);
	}

	function consultarAlumno(){

		$con = Conectarse();
		$option = $_GET['optionsRadios'];
		$str = $_GET['str'];
		$flag = 0;

		switch ($option) {
			case 1:
				$sql="SELECT * FROM alumno WHERE nombre = '".$str."' OR apellidopaterno = '".$str."' OR apellidomaterno = '".$str."'";
				$result = mysqli_query($con,$sql);
				break;
			case 2:
				$sql="SELECT * FROM alumno WHERE correo = '".$str."'";
				$result = mysqli_query($con,$sql);
				break;
			case 3:
				$sql1="SELECT id FROM tt WHERE titulo = '".$str."'";
				$result1 = mysqli_query($con,$sql1);


				while($row1 = mysqli_fetch_array($result1)){
					$sql2="SELECT * FROM alumno WHERE id_tt = '".$row1['id']."'";
					$result2 = mysqli_query($con,$sql2);
					while($row2 = mysqli_fetch_array($result2)){
						
						echo "<tr><td style='display: none;'><p id='id". $row2['id']."' name='id". $row2['id']."'>".$row2['id']."</p></td>";
					  	echo "<td>".$row2['nombre']." ".$row['apellidopaterno']." ".$row2['apellidomaterno']."</td>";
					  	echo "<td>".$row2['correo']."</td>";
					  	echo "<td>".$row2['telefono']."</td>";
					  	echo "<td>".$row2['celular']."</td>";
					  	echo "<td>".$str."</td>";
					  	echo "<td><a href='edicionAlumno.php?id=".$row2['id']."'><img src='images/pencil2.png' width='25' title='Editar'></a></td></tr>";
					  	$flag = 1;
					}
				}


				break;
		}

		if($option == 1 or $option == 2){
			while($row = mysqli_fetch_array($result))
			  {

			  	$sql1="SELECT titulo FROM tt WHERE id = '".$row['id_tt']."'";
				$result1 = mysqli_query($con,$sql1);
				$row1 = mysqli_fetch_array($result1);
			  
			  echo "<tr><td style='display: none;'><p id='id". $row['id']."' name='id". $row['id']."'>".$row['id']."</p></td>";
			  echo "<td>".$row['nombre']." ".$row['apellidopaterno']." ".$row['apellidomaterno']."</td>";
			  echo "<td>".$row['correo']."</td>";
			  echo "<td>".$row['telefono']."</td>";
			  echo "<td>".$row['celular']."</td>";
			  echo "<td>".$row1['titulo']."</td>";
			  echo "<td><a href='edicionAlumno.php?id=".$row['id']."'><img src='images/pencil2.png' width='25' title='Editar'></a></td></tr>";
			  $flag = 1;
			  }
		}

		Cerrar($con);

		if($flag == 0){
			echo "<script>alert('No se ha encontrado su petición');</script>";
		}
	}

	function consultarActividades(){

		$id = $_GET['id'];
		$contador = 0;

		$con = Conectarse();

		$sql="SELECT titulo, fechaentrega, numero FROM actividad WHERE id_tt = '".$id."'";
		$result = mysqli_query($con,$sql);
		$num_rows = mysqli_num_rows($result);
		echo '{"actividades": [';
		while($row = mysqli_fetch_array($result))
		  {
		  	$contador = $contador + 1;
  			$actividad = new Actividad();
			$actividad->titulo = $row['titulo'];
			//$fecha = date("d-m-Y", strtotime($row['fechaentrega']));
			$fecha = $row['fechaentrega'];
			$actividad->fechaentrega = $fecha;
			$actividad->numero = $row['numero'];
			
			echo json_encode($actividad);
			if($contador != $num_rows)
				echo ",";
		  }
		echo ']}';


		Cerrar($con);
	}

	function consultarTesis(){

		$contador = 0;

		$con = Conectarse();

		$sql="SELECT id, url FROM tesis";
		$result = mysqli_query($con,$sql);
		$num_rows = mysqli_num_rows($result);
		echo '{"tesis": [';
		while($row = mysqli_fetch_array($result))
		  {
		  	$contador = $contador + 1;
  			$tesis = new Tesis();
			$tesis->id = $row['id'];
			$tesis->url = $row['url'];
			
			echo json_encode($tesis);
			if($contador != $num_rows)
				echo ",";
		  }
		echo ']}';


		Cerrar($con);
	}

	switch($proceso){
		case 1:
			consultarTT();
		break;
		case 2:
			consultarAlumno();
		break;
		case 3:
			consultarActividades();
		break;
		case 4:
			consultarTesis();
		break;
	}
?>