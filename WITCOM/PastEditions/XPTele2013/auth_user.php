<?php
session_start();
include 'myscon.ajs.php';
include 'libs/util.php';

if(authenticateUser($_POST[usuario], $_POST[pass])){
  $usr_array = explode('_',trim($username));
  $_SESSION['user_id'] = $usr_array[1];
}
?>
