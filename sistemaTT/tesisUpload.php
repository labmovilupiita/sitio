<?php include("database.php")?>
<?php
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if (($_FILES["file"]["size"] < 30000000) && in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
      if($_COOKIE['usertipo'] == 0)
        header( 'Location: Profesor/tesis.php?status=3&error='.$_FILES["file"]["error"] ) ;
      else if($_COOKIE['usertipo'] == 1)
        header( 'Location: Profesor/tesis.php?status=3&error='.$_FILES["file"]["error"] ) ;
  } else {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("/Applications/XAMPP/xamppfiles/htdocs/sistemaYahir/Tesis/" . $_FILES["file"]["name"])) {
      if($_COOKIE['usertipo'] == 0)
        header( 'Location: Profesor/tesis.php?status=2' ) ;
      else if($_COOKIE['usertipo'] == 1)
        header( 'Location: Alumno/tesis.php?status=2' ) ;
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],"/Applications/XAMPP/xamppfiles/htdocs/sistemaYahir/Tesis/" . $_FILES["file"]["name"]);
      
      $con = Conectarse();

      if($_COOKIE['usertipo'] == 0){

        if($_POST['bandera'] == 1)
          $sql = "INSERT INTO tesis (url, bandera, id_tt) VALUES ('".$_FILES["file"]["name"]."', '$_POST[bandera]', '$_POST[tt]')";
        else{
          $fecha = date("Y-m-d", strtotime($_POST['fecha']));
          $sql = "INSERT INTO tesis (titulo, nombre1, nombre2, asesor, fecha, url, bandera) VALUES ('$_POST[titulo]', '$_POST[a2]', '$_POST[a3]', '$_POST[a1]','".$fecha."','".$_FILES["file"]["name"]."', '$_POST[bandera]')";
        }
      }
      else{

        $sqlx="SELECT id_tt FROM alumno WHERE id = '".$_COOKIE['userid']."'";
        $result = mysqli_query($con,$sqlx);

        $row = mysqli_fetch_array($result);

        $sql = "INSERT INTO tesis (url, bandera, id_tt) VALUES ('".$_FILES["file"]["name"]."', 1, '".$row['id_tt']."')";


      }

      if (!mysqli_query($con,$sql))
        {
          die('Error: ' . mysqli_error($con));
        }

      Cerrar($con);
      if($_COOKIE['usertipo'] == 0)
        header( 'Location: Profesor/tesis.php?status=1' ) ;
      else if($_COOKIE['usertipo'] == 1)
        header( 'Location: Alumno/tesis.php?status=1' ) ;
    }
  }
} else {
  header( 'Location: Profesor/tesis.php?status=3&error=Archivo invalido' ) ;
}
?>