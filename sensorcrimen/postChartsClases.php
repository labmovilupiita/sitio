<?php
include_once './Model/Conexion.php';
include_once './Model/ReporteRoboDAO.php';
$rrdao = new ReporteRoboDAO();
$total = $rrdao->totalByClase("");
$violencia = round(($rrdao->totalByClase("violencia") * 100) / $total, 1);
$sviolencia = round(($rrdao->totalByClase("sviolencia") * 100) / $total, 1);
$neutro = round(($rrdao->totalByClase("neutro") * 100) / $total, 1);
?>

<div class="col-md-4 col-sm-6 col-xs-12">
    <div class="x_panel tile fixed_height_320 overflow_hidden">
        <div class="x_title">
            <h2>Clasificación</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="" style="width:100%">
                <tr>
                    <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                        <table class="tile_info">
                            <tr>
                                <td>
                                    <p><i class="fa fa-square red"></i>Violencia </p>
                                </td>
                                <td><?php echo $violencia ?>%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p><i class="fa fa-square orange"></i>Sin Violencia </p>
                                </td>
                                <td><?php echo $sviolencia ?>%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p><i class="fa fa-square green"></i>No Especificado </p>
                                </td>
                                <td><?php echo $neutro ?>%</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    function init_chart_doughnut() {

        if (typeof (Chart) === 'undefined') {
            return;
        }


        if ($('.canvasDoughnut').length) {

            var chart_doughnut_settings = {
                type: 'doughnut',
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                data: {
                    labels: [
                        "Violencia",
                        "Sin Violencia",
                        "No Especificado"

                    ],
                    datasets: [{
                            data: [<?php echo $violencia ?>, <?php echo $sviolencia ?>, <?php echo $neutro ?>],
                            backgroundColor: [
                                "#E74C3C",
                                "#F39C12",
                                "#1ABB9C"
                            ],
                            hoverBackgroundColor: [
                                "#E74C3C",
                                "#F39C12",
                                "#1ABB9C"
                            ]
                        }]
                },
                options: {
                    legend: false,
                    responsive: false
                }
            }

            $('.canvasDoughnut').each(function () {

                var chart_element = $(this);
                var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

            });

        }

    }
</script>