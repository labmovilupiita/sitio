<?php

/**
 * @author ram
 */
class AtributoCaracteristicaDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function getAtributoCaracteristicas($id) {
        $atributocaracteristicas = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("select atributo.idatributo, atributo.nombre, caracterista.idcaracterista, caracterista.nombre from caracterista join caracterista_atributo on caracterista_atributo.caracterista_idcaracterista = caracterista.idcaracterista join atributo on atributo.idatributo = caracterista_atributo.atributo_idatributo and idreporteRobo =:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {

            $atributocaracteristica = new AtributoCaracteristica($row[0]);
            $atributocaracteristica->setAtributo($row[1]);
            $atributocaracteristica->setIdcaracteristica($row[2]);
            $atributocaracteristica->setCaracteristica($row[3]);
            $atributocaracteristica->setIdreporte($id);
            array_push($atributocaracteristicas, $atributocaracteristica);
        }
        return $atributocaracteristicas;
    }

    function getMostCaracteristicas() {

        $caracteristicas = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT caracterista.nombre as nombre, COUNT(*) as veces FROM caracterista_atributo join caracterista on caracterista.idcaracterista=caracterista_idcaracterista GROUP BY nombre  order by veces desc limit 5;");
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $caracteristica = array($row[0], $row[1]);
            array_push($caracteristicas, $caracteristica);
        }
        return $caracteristicas;
    }

    function getMostAtributos() {
        //SELECT caracterista.nombre as nombrec ,atributo.nombre as nombre, COUNT(*) as veces FROM caracterista_atributo  join atributo on atributo.idatributo=atributo_idatributo and caracterista_atributo.caracterista_idcaracterista != 4 left join caracterista on caracterista.idcaracterista = caracterista_idcaracterista GROUP BY nombre   order by veces desc ;

        $atributos = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT caracterista.nombre as nombrec ,atributo.nombre as nombre, COUNT(*) as veces FROM caracterista_atributo  join atributo on atributo.idatributo=atributo_idatributo and caracterista_atributo.caracterista_idcaracterista != 4 left join caracterista on caracterista.idcaracterista = caracterista_idcaracterista GROUP BY nombre,nombrec   order by veces desc  limit 5;");
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $atributo = array($row[0], $row[1], $row[2]);
            array_push($atributos, $atributo);
        }
        return $atributos;
    }

}
