<?php

include '../Model/Conexion.php';
include '../Model/Publicacion.php';
include '../Model/PublicacionDAO.php';

function extraer() {
    $token = "EAAEB01ZCmjDoBAGRqYxhdJwSMoyHaCtY1OGA87YXXD74Te1nZCJd1rUzXIrBLKnkPmNRbpyKf5DaS03FEaZCOvFrjHCM5WlrCoTrfTFYGIxDeTEAwaYKhvPZBPOLlh30QYfd90PvhYhhPYYX1N1B";
    $url = "https://graph.facebook.com/v2.8/1115322691824958/feed?fields=message,created_time&limit=100&format=json&access_token=" . $token;
    $pubdao = new PublicacionDAO();
    $exit = true;
    try {
        do {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($response);
            for ($i = 0; $i < count($json->data); $i++) {
                if (isset($json->data[$i]->message)) {
                    $message = $json->data[$i]->message;
                    $message = " " . $message;
                    $date = $json->data[$i]->created_time;
                    $fecha = substr($date, 0, strpos($date, "T"));
                    $hora = substr($date, strpos($date, "T") + 1, 8);
                    if (stripos($message, "#autoRobado")) {
                        $publicacion = new Publicacion($json->data[$i]->id, $json->data[$i]->message, $fecha, $hora, 0, "1115322691824958");
                        $pubdao->insertPublicacion($publicacion);
                    }
                }
            }
            if (isset($json->paging->next)) {
                $url = "" . $json->paging->next;
            }
            if (count($json->data) != 0) {
                $exit = false;
            }
        } while ($exit);
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}

extraer();