<?php
if($_SESSION['ingreso'] != "LOGGED")
echo '<h2>No has iniciado sesi�n</h2>';
session_destroy();
include 'footer.php';
die();
?>