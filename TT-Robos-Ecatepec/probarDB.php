<?php

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
    return NULL;
}