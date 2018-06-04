<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "148.204.86.18";
$port ="9090";
$user = "systemtt4";
$password = "Systemtt4.";
$database = "tta016";

try {
    $connection = new PDO('mysql:host=' . $host . ';dbname=' . $database .';port=' . $port, $user, $password);
    echo "conectado";
} catch (PDOException $e) {
    echo "errror";
echo "<br>";
echo $e;
    return NULL;
}
