<?php

/**
 * Description of Extractor
 *
 * @author ram
 */

header('Content-Type: text/html; charset=utf-8');

class Extractor {

    private $id;
    private $idFb;
    private $hash;
    private $token = "EAAEB01ZCmjDoBAFo9urSH6SJcgFoiALDNlXCusGanGPXfjaV0xIXFMlFnuILZCZAWZAwLYdvGMh5JXIJ3Sm1QNtcVGKsoSI87w6PI2BQZCxnh17ZAZBQXoJZCJ63xjR6z29f9NzO7oAcD9KsRdgsexO4HsNgPAi3gsgZD";

    function __construct($id, $idFb, $hash) {
        $this->id = $id;
        $this->idFb = $idFb;
        $this->hash = $hash;
    }

    function extraer() {

        $url = "https://graph.facebook.com/v2.8/" . $this->idFb . "/feed?fields=message,created_time,likes.limit(100),shares&limit=100&format=json&access_token=" . $this->token;
        error_log($url);
        $pubdao = new PublicacionDAO();
        $exit = true;
        try {
            do {
                error_log($url);
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
                        if (isset($json->data[$i]->shares)) {
                            $shares = $json->data[$i]->shares->count;
                        } else {
                            $shares = 0;
                        }
                        if (isset($json->data[$i]->likes)) {
                            $likes = count($json->data[$i]->likes->data);
                        } else {
                            $likes = 0;
                        }

                        if ($this->validar($json->data[$i]->id)) {
                            if (stripos(" ".$json->data[$i]->message, $this->hash) > 0) {
                                $publicacion = new Publicacion($json->data[$i]->id, $json->data[$i]->message, $fecha, $hora, 0, $likes, $shares, $this->id);
                                $pubdao->insertPublicacion($publicacion);
                            }
                        } else {
                            $exit = false;
                        }
                    }
                }
                if (isset($json->paging->next)) {
                    $url = "" . $json->paging->next;
                }
                if (count($json->data) == 0) {
                    $exit = false;
                    error_log("---- DATA FALSE ---");
                }
            } while ($exit);
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    function validar($id) {
        $pubdao = new PublicacionDAO();
        if (is_null($pubdao->selectPublicacion($id))) {
            return true;
        } else {
            return false;
        }
    }

}
