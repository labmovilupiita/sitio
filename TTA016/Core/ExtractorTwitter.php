<?php

/**
 * Description of ExtractorTwitter
 *
 * @author ram
 */
require_once('../Model/Conexion.php');
require_once('TwitterAPIExchange.php');
require_once('../Model/Publicacion.php');
require_once('../Model/PublicacionDAO.php');
require_once('../Model/FuenteInformacion.php');
require_once('../Model/FuenteInformacionDAO.php');

class ExtractorTwitter {

    private $settings = array(
        'oauth_access_token' => "2254317488-y5N8dpK58cHFKmxZM5oQksT9e2dbAq4UT732TGY",
        'oauth_access_token_secret' => "428ZkUE1lpVqZ6RdR75uBxDroyGJZIDCvPxXQxgCXcrs8",
        'consumer_key' => "FP043YiiF0wpqo7PpQ0fM15Bd",
        'consumer_secret' => "ecLl0WkB1NQjrGaIIJwPtwd9WVARVp9zxSX8aamfkK3VTFRwVI"
    );
    private $id;

    function __construct($id) {
        $this->id = $id;
    }

    function extraer() {
        //$nextPage = '?q=robo ecatepec';
        $nextPage = "?max_id=859086543461298175&q=robo ecatepec&include_entities=1";
        do {
            $pubdao = new PublicacionDAO();
            $url = "https://api.twitter.com/1.1/search/tweets.json";
            $getfield = $nextPage;
            $requestMethod = 'GET';
            $twitter = new TwitterAPIExchange($this->settings);
            $json = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();
            echo $json . "<br><br><br><br><br><br>";
            $json = json_decode($json);
            $flag = 1;
            $nextPage = "";
//            try {
//                for ($i = 0; $i < count($json->statuses); $i++) {
//                    if ($this->validar($json->statuses[$i]->id)) {
//                        $fecha = $json->statuses[$i]->created_at;
//                        $hora = split(" ", $fecha)[3];
//                        $fecha = split(" ", $fecha)[5] . "-" . $this->month(split(" ", $fecha)[1]) . "-" . split(" ", $fecha)[2];
//                        $publicacion = new Publicacion($json->statuses[$i]->id, $json->statuses[$i]->text, $fecha, $hora, 0, $this->id);
//                        $nextPage = "";
////$nextPage = $json->search_metadata->next_results;
//                        //$pubdao->insertPublicacion($publicacion);
//                    } else {
//                        $nextPage = "";
//                        $i = count($json->statuses);
//                    }
//                }
//            } catch (Exception $e) {
//                $nextPage = "";
//                $flag = 0;
//            }
        } while ($nextPage != "");
        return $flag;
    }

    function validar($id) {
        $pubdao = new PublicacionDAO();
        if (is_null($pubdao->selectPublicacion($id))) {
            return true;
        } else {
            return false;
        }
    }

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

}

$ext = new ExtractorTwitter("59025f1e2573f");
$ext->extraer();
