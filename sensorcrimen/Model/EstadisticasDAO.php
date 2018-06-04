<?php


include_once 'Conexion.php';

class EstadisticasDAO {

	 function __construct() {
        $this->dbc = new Conexion();
    }

	function obtenerEstadisticasRobo($fechaInicio,$fechaFin){

		 $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }

        
        $query = $con->prepare("select c.nombre, count(r.idpublicacion),MONTH(p.fecha),year(p.fecha) from publicacion p join reporterobo r on p.idpublicacion = r.idpublicacion left join clase c on c.idClase = r.idClase where (p.fecha between '".$fechaInicio."' and '".$fechaFin."') group by c.nombre,MONTH(p.fecha),year(p.fecha) order by year(p.fecha),month(p.fecha) asc");
        //$query->bindParam(":fechaInicio", $fechaInicio);
        //$query->bindParam(":fechaFin", $fechaFin);
        $query->execute();
        $con = NULL;
        //Si la referencia no fue encontrada
        $result = array();
        $ctaResultados=0;

        error_log("Resultado: ".$query->rowCount());
        error_log("Fecha Inicio: ".$fechaInicio);
        error_log("Fecha Fin: ".$fechaFin);
        while ($row = $query->fetch()) {
        	
        	//error_log("Resultado: ".$row[0]);
        	array_push($result,array("impacto"=>$row[0],"total"=>$row[1],"mes"=>$row[2],"year"=>$row[3]));
            $ctaResultados = $ctaResultados + 1;
        }

        return $result;

	}


}