<?php

$fecha = "Thu Apr 27 19:58:26 +0000 2017";
$fecha = split(" ", $fecha)[5] . "-" . month(split(" ", $fecha)[1]) . "-" . split(" ", $fecha)[2];

function month($m) {
    switch ($m) {
        case "Jan":
            return "01";
            break;
        case "Feb":
            return "02";
            break;
        case "Mar":
            return "03";
            break;
        case "Apr":
            return "04";
            break;
        case "May":
            return "05";
            break;
        case "Jun":
            return "06";
            break;
        case "Jul":
            return "07";
            break;
        case "Aug":
            return "08";
            break;
        case "Sep":
            return "09";
            break;
        case "Oct":
            return "10";
            break;
        case "Nov":
            return "11";
            break;
        case "Dec":
            return "12";
            break;
    }
}

echo $fecha;
