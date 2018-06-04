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
            error_log($row[3] . "-" . $row[1]);
            $atributocaracteristica = new AtributoCaracteristica($row[0]);
            $atributocaracteristica->setAtributo($row[1]);
            $atributocaracteristica->setIdcaracteristica($row[2]);
            $atributocaracteristica->setCaracteristica($row[3]);
            $atributocaracteristica->setIdreporte($id);
            array_push($atributocaracteristicas, $atributocaracteristica);
        }
        return $atributocaracteristicas;
    }

}
