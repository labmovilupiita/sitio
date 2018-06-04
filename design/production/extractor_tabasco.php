<?php 

require_once( '/var/www/html/design/Facebook/autoload.php' );

use Facebook\Facebook;
use Facebook\FacebookApp;
use Facebook\FacebookRequest;

function  extraccion($idFuenteFacebook,$idFuenteInformacion){
  //Conexion base de datos
  $mysqli = new mysqli("148.204.86.18", "systemtt4", "Systemtt4.", "tematicasTabasco", 9090);
  if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }else{  
    $app_id = "112900325970685";
    $secret = "3c7302a00241803f42bbd377ea5932ee";
    $access_token = "112900325970685|mKJw0Uq7risQSEzZmAPjUfnHMss";    

    $fb = new Facebook([
      'app_id' => $app_id,
      'app_secret' => $secret,
      'default_graph_version' => 'v2.9',
      'default_access_token' => $access_token,
      ]);    

    //Conexion API Facebook
    try{
      $response = $fb->get("/".$idFuenteFacebook."?fields=posts{message,created_time,likes.limit(0).summary(true)}");
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }    

    $sql = "SELECT idpublicacion,fecha,hora FROM publicacion where idfuenteInformacion='".$idFuenteInformacion."' order by idpublicacion desc limit 1";
    $result = $mysqli->query($sql);
    $recent_id = $result->fetch_assoc();

    $cont = 0;
    $decodedBody = $response->getDecodedBody();
    $post = $decodedBody['posts'];
    $data = $post['data'];
    $next = $post['paging'];
    $inicio = date('2017-01-01');
    $flag = true;
    while($next['next']!=null){
      ini_set('max_execution_time', 300);
      foreach ($data as $val) {
        $date = strtotime($val['created_time']);
        $likes = $val['likes'];
        $summary = $likes['summary'];
        $total_likes = $summary['total_count'];
        
        if($inicio>date('Y-m-d',$date)){
          $flag = false;
	  echo $count;
          break;
        }
  
        if($recent_id["idpublicacion"]!=null){
          if($recent_id["idpublicacion"]==$val['id'] || $recent_id["fecha"]>date('Y-m-d',$date) || $recent_id["hora"]>date('H:i:s',$date)){
             $flag = false;
             break;
          }
        }

        $sql = "INSERT INTO publicacion (idpublicacion,publicacion,fecha,hora,likes,idfuenteInformacion) VALUES ('".$val['id']."','".utf8_decode($val['message'])."','".date('Y-m-d',$date)."','".date('H:i:s',$date)."','".$total_likes."','".$idFuenteInformacion."')";
        echo $sql."<hr>";    

        if ($mysqli->query($sql) === TRUE) 
          $cont++;
        else 
          echo "Error: " . $sql . "<br>" . $mysqli->error;
      }
      $curl = curl_init($next['next']);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $response_get = json_decode(curl_exec($curl),true);  
      curl_close($curl);     
      if($flag==false){
	echo $count;
      	break;
      }
      $data = $response_get['data'];
      $next = $response_get['paging'];
      //echo "<h1>------".$cont."</h1>";
    }
  }
}
	echo $count;
?>


