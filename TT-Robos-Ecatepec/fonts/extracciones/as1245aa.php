<?php

$file = fopen("date.php","w");
fwrite($file,date("y-m-d"));
fclose($file);
echo "hola";
