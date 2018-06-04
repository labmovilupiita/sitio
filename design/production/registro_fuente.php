<?php 
  
  include 'extractor_tabasco.php';
  
  //Conexion base de datos
  $mysqli = new mysqli("148.204.86.18", "systemtt4", "Systemtt4.", "tematicasTabasco", 9090);
  if ($mysqli->connect_errno) 
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

  $sql  = "SELECT CONVERT(idfuenteInformacion,UNSIGNED INTEGER) as id FROM fuenteinformacion order by id desc limit 1";
  $result = $mysqli->query($sql);
  $currentId = $result->fetch_assoc();
  $fuenteinformacion = $currentId['id']+1;
  if($_POST['fuente']!=null){
    extraccion( $_POST['facebook'], $_POST['fuente']);
    echo $fuenteinformacion;
  }else{
    $sql = "INSERT INTO fuenteinformacion(idfuenteinformacion,facebookId,nombre,hashtag,idubicacionfuente) VALUES ('".$fuenteinformacion."','".$_POST['id_fuente']."','".utf8_decode($_POST['nombre_fuente'])."','".$_POST['hashtags']."',null)";
    if ($mysqli->query($sql) === TRUE) {
      echo extraccion( $_POST['id_fuente'], $fuenteinformacion );
	echo $fuenteinformacion;
	echo $_POST['id_fuente'];
    }
    else 
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
?>
