<?php

include_once 'EstadisticasDAO.php';

class EstadisticasMapper {

	function obtenerEstadisticas($rangoFecha){



		$arrayFecha = explode(" ",$rangoFecha);

		$arrayAux =explode("/",$arrayFecha[0]);
		$strFechaInicio = $arrayAux[2]."-".$arrayAux[0]."-".$arrayAux[1];

		$arrayAux =explode("/",$arrayFecha[2]);
		$strFechaFin = $arrayAux[2]."-".$arrayAux[0]."-".$arrayAux[1];

		$dao = new EstadisticasDAO();

		$datas = $dao->obtenerEstadisticasRobo($strFechaInicio,$strFechaFin);

		return $this->mapResultados($datas);




	}

	function existe($list,$elem){
		foreach($list as $e){
			if($e == $elem)
				return True;
		}

		return False;
	}



	function mapResultados($datas){

		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		$ejeX = array();
		$violencia = array();
		$sinViolencia = array();
		$noEspecificados = array();

		$strBuffer = "";

		foreach($datas as $data){
			$strAux = $meses[$data["mes"]-1]."-".$data["year"];

			if($strBuffer != "" and $strBuffer != $strAux){

				$lenVio = count($violencia);
				$lenSinVio = count($sinViolencia);
				$lenNoEsp = count($noEspecificados);

				$lenEjeX = count($ejeX);

				if($lenEjeX != $lenVio)
					array_push($violencia,0);

				if($lenEjeX != $lenSinVio)
					array_push($sinViolencia,0);

				if($lenEjeX != $lenNoEsp)
					array_push($noEspecificados,0);
			}


			if(!($this->existe($ejeX,$strAux))){
				array_push($ejeX,$strAux);
			}

			if($data["impacto"] == "violencia")
				array_push($violencia,$data["total"]);
			else if(($data["impacto"] == "sin_violencia"))
				array_push($sinViolencia,$data["total"]);
			else if(($data["impacto"] == "no_especifico"))
				array_push($noEspecificados,$data["total"]);

			$strBuffer = $strAux;

			


		}


		return array("ejex"=>$ejeX,"violencia"=>$violencia,"sinViolencia"=>$sinViolencia,"noEspecificados"=>$noEspecificados);
	}



}

