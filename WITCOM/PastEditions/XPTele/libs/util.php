<?php
// FUNCIONES DE UTILERIA DEL PROYECTO

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function authenticateUser($username, 
                          $password)
{
  if (!isset($username) || !isset($password))
    return false;
  $usr_array = explode('_',trim($username));
  if (count($usr_array) != 2){
	return false;
  }else{
 	if(ctype_digit($usr_array[1]) && $usr_array[0]="user" ){
		$user_id = $usr_array[1];
	}else{
		return false;
	}
  }
  $password = mysql_real_escape_string(trim($password));		
  $query = "SELECT pass FROM auditorio
               WHERE id_usuario = $user_id
               AND pass = '$password'";

  $result = mysql_query ($query);

  if (mysql_num_rows($result) != 1) {
    return false;
    
  }else{
    return true;
  }
}

function authenticatePonente($mail, 
                          $password)
{
  if (!isset($mail) || !isset($password))
    return false;
  $password = mysql_real_escape_string(trim($password));                
  $mail=mysql_real_escape_string(trim($mail));          
  $query = "SELECT pass FROM ponentes
               WHERE email = '$mail'
               AND pass = '$password'";

  $result = mysql_query ($query);

  if (mysql_num_rows($result) != 1) 
    return false;
  else
    return true;

}

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

function mmail($to,$subject,$body){

$cons = mysql_query("SELECT * from properties where active = 1");
$row = mysql_fetch_array($cons);


$transport = Swift_SmtpTransport::newInstance($row[SMTP_server], $row[port], $row[type_sec])
  ->setUsername($row[mail])
  ->setPassword($row[pass]);

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance($subject)
  ->setFrom(array($row[mail] => 'XPTELE 2013'))
  ->setTo(array($to,'xptele2013@gmail.com'))
  ->setBody($body);
//telemática
$result = $mailer->send($message);    
    
}

?>
