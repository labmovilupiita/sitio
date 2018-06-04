<?php
require_once 'libs/Swift-4.3.1/lib/swift_required.php';
include 'myscon.ajs.php';

$cons = mysql_query("SELECT * from properties where active = 1");
$row = mysql_fetch_array($cons);


$transport = Swift_SmtpTransport::newInstance($row[SMTP_server], $row[port], $row[type_sec])
  ->setUsername($row[mail])
  ->setPassword($row[pass]);

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Test Subject')
  ->setFrom(array($row[mail] => 'ABC'))
  ->setTo(array('lenninduu@gmail.com'))
  ->setBody('This is a 1 mail 2.');

$result = $mailer->send($message);
?>
