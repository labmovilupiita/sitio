<?php include("database.php")?>
<?php
	$proceso = $_GET['proceso'];

	class tesis {
	    public $id = "";
	    public $url = "";
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
		case 4:
			consultarTesis();
		break;
	}
?>