<?php
require_once 'libs/Swift-4.3.1/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('experienciastelematicas@gmail.com')
  ->setPassword('telematicas2013');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Test Subject')
  ->setFrom(array('experienciastelematicas@gmail.com' => 'ABC'))
  ->setTo(array('lenninduu@gmail.com'))
  ->setBody('This is a test mail.');

$result = $mailer->send($message);
?>