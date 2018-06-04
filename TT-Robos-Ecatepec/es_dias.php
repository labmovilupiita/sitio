<?php
include_once './Model/Conexion.php';
include_once './Model/ReporteRoboDAO.php';
$rrdao = new ReporteRoboDAO();
$dias = $rrdao->getDiasReportes();
?>

<div id="es_dias" style="width:100%; height:200px;"></div>

<script>
    function chart_dias() {

        if (typeof (Morris) === 'undefined') {
            return;
        }
        console.log('init_morris_charts');

        Morris.Bar({
        element: 'es_dias',
                data: [
                {dia: '<?php echo $dias[0][0] ?>', reportes: <?php echo $dias[0][1] ?>},
                {dia: '<?php echo $dias[1][0] ?>', reportes: <?php echo $dias[1][1] ?>},
                {dia: '<?php echo $dias[2][0] ?>', reportes: <?php echo $dias[2][1] ?>},
                {dia: '<?php echo $dias[3][0] ?>', reportes: <?php echo $dias[3][1] ?>},
                {dia: '<?php echo $dias[4][0] ?>', reportes: <?php echo $dias[4][1] ?>},
                {dia: '<?php echo $dias[5][0] ?>', reportes: <?php echo $dias[5][1] ?>},
                {dia: '<?php echo $dias[6][0] ?>', reportes: <?php echo $dias[6][1] ?>}],
                        xkey: 'dia',
                        ykeys: ['reportes'],
                        labels: ['Reportes'],
                        barRatio: 0.4,
                        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                        xLabelAngle: 35,
                        hideHover: 'auto',
                        resize: true
                });
            }
</script>