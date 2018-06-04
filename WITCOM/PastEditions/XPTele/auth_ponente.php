<?php
session_start();
include 'myscon.ajs.php';
include 'libs/util.php';

if(authenticatePonente($_POST[mail], $_POST[pass])){
  $usr_array = explode('_',trim($username));
  $_SESSION['ponente_id'] = $usr_array[1];
}
?>
