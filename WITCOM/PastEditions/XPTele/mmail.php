<?php


$cons = mysql_query("SELECT * from properties where active = 1");
$row = mysql_fetch_array($cons);


$transport = Swift_SmtpTransport::newInstance($row[SMTP_server], $row[port], $row[type_sec])
  ->setUsername($row[mail])
  ->setPassword($row[pass]);

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance($subject)
  ->setFrom(array($row[mail] => 'XPTELE 2014'))
  ->setTo($to)
  ->setBody($body);
//telemática
$result = $mailer->send($message);    
    
?>