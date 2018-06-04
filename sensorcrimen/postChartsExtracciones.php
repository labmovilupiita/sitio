<?php
include_once './Model/Conexion.php';
include_once './Model/PublicacionDAO.php';
$pdao = new PublicacionDAO();

date_default_timezone_set("America/Mexico_City");
?>

<div class="col-md-8 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Extracciones por día</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="graph_bar" style="width:100%; height:280px;"></div>
        </div>
    </div>
</div>

<script>
    function init_charts_bar() {

        if (typeof (Morris) === 'undefined') {

            return;
        }
        console.log('init_morris_charts');

        Morris.Bar({
        element: 'graph_bar',
                data: [
<?php $datetime = new DateTime(); ?>
                {device: '<?php echo $datetime->modify('-6 day')->format('Y-m-d'); ?>', geekbench: <?php echo $pdao->totalFecha($datetime->modify('-6 day')->format('Y-m-d')) ?>},
<?php $datetime = new DateTime(); ?>
                {device: '<?php echo $datetime->modify('-5 day')->format('Y-m-d'); ?>', geekbench: <?php echo $pdao->totalFecha($datetime->modify('-5 day')->format('Y-m-d')) ?>},
<?php $datetime = new DateTime(); ?>
                {device: '<?php echo $datetime->modify('-4 day')->format('Y-m-d'); ?>', geekbench: <?php echo $pdao->totalFecha($datetime->modify('-4 day')->format('Y-m-d')) ?>},
<?php $datetime = new DateTime(); ?>
                {device: '<?php echo $datetime->modify('-3 day')->format('Y-m-d'); ?>', geekbench: <?php echo $pdao->totalFecha($datetime->modify('-3 day')->format('Y-m-d')) ?>},
<?php $datetime = new DateTime(); ?>
                {device: '<?php echo $datetime->modify('-2 day')->format('Y-m-d'); ?>', geekbench: <?php echo $pdao->totalFecha($datetime->modify('-2 day')->format('Y-m-d')) ?>},
<?php $datetime = new DateTime(); ?>
                {device: '<?php echo $datetime->modify('-1 day')->format('Y-m-d'); ?>', geekbench: <?php echo $pdao->totalFecha($datetime->modify('-1 day')->format('Y-m-d')) ?>},
<?php $datetime = new DateTime(); ?>
                {device: '<?php echo $datetime->modify('-0 day')->format('Y-m-d'); ?>', geekbench: <?php echo $pdao->totalFecha($datetime->modify('-0 day')->format('Y-m-d')) ?>}
                ],
                xkey: 'device',
                ykeys: ['geekbench'],
                labels: ['Post Extraidos'],
                barRatio: 0.4,
                barColors: ['#34495E', '#ACADAC', '#3498DB'],
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
        });
    }
</script>