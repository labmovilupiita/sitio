<?php
include_once './Model/Conexion.php';
include_once './Model/ReporteRobo.php';
include_once './Model/ReporteRoboDAO.php';
include_once './Model/Publicacion.php';
include_once './Model/PublicacionDAO.php';
include_once './Model/FuenteInformacion.php';
include_once './Model/FuenteInformacionDAO.php';
$rrdao = new ReporteRoboDAO();
$reporte = new ReporteRobo();
$pdao = new PublicacionDAO();
$publicacion = new Publicacion();
$reportes = $rrdao->selectPostReporteRoboTablaDinamica();

function crarTexto($texto){

  $numCaracteres = 95;

  $strAux = "";
  $buffer = "";
  for($i=0;$i<strlen($texto);$i++){ 
    //echo $cadena[$i]; 
    $c = substr($texto,$i,1);
    if($c  != "\n"){
      if(strlen($buffer)<=$numCaracteres){
        $buffer = $buffer.$c;
      }else{

        if($c  != " "){
          $j = strlen($buffer) -1;
          $ca = substr($buffer,$j,1);
          while($j!= 0 and  $ca!=" " ){
            $j--;
            $ca = substr($buffer,$j,1);
            
          } 
          $dif = strlen($buffer) - $j;
          $i = $i - $dif;
          if($i< 0){
            $i = 0;
          }
          $buffer = substr($buffer,0,$j);
        }

        $strAux = $strAux.$buffer."<br>";
        $buffer = "";

      }


    }else{
      $strAux = $strAux.$buffer."<br>";
      $buffer = "";
    }


  } 
  $strAux = $strAux.$buffer;


  return $strAux;//substr($texto,0,1);//"Hola desde funcion: ".strlen($texto);

}
?>



<?php

echo "<thead>
    <tr>
      <th>Fecha</th>
      <th>Fuente</th>
      <th>ID</th>
      <th>Impacto</th>
      <th>Publicacion</th>
    </tr>
</thead>";

echo "<tbody>";
foreach ($reportes as $reporte) {
    $publicacion = $pdao->selectPublicacionForReporte($reporte->getPublicacion());
    ?>
    <tr>

        
        

        <?php 
        
            echo "<td>".$publicacion->getFecha()."</td>";
            echo "<td>".$publicacion->getFuenteInformacion()->getNombre()."</td>";
            echo "<td>".$publicacion->getIdPublicacion()."</td>";
            switch ($reporte->getClase()) {
                case 4: {
                            echo '<td>Violencia</td>';
                        break;
                   }
                case 6: {
                       echo '<td>Sin Violencia</td>';
                        break;
                    }
                case 5: {
                       echo '<td>No Especificado</td>';
                        break;
                    }
            }

            /*"<a href=\"#\" class=\"openModalReporte orange\" id-reporte=".$reporte->getIdReporteRobo().">Detalles...</a>"*/

            echo "<td>".crarTexto($publicacion->getPublicacion())."<br><a href=\"#\" class=\"openModalReporte orange\" id-reporte=".$reporte->getIdReporteRobo().">Detalles...</a></td>";

            /*echo "<td>25 julio 30</td>";
            echo "<td>345678ghjkl</td>";
            echo "<td>Hola buenas tarde violencia</td>";
            echo "<td>Violencia</td>";*/
        ?>
    </tr>
    <?php
}
echo "</tbody>";
?>

