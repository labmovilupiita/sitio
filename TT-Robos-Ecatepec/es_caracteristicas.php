<?php
include_once './Model/Conexion.php';
include_once './Model/AtributoCaracteristicaDAO.php';

$acdao = new AtributoCaracteristicaDAO();
$morec = $acdao->getMostCaracteristicas();
$morea = $acdao->getMostAtributos();
?>

<div class="col-md-12">
    <div class="row" style="text-align: center;">
        <div class="col-md-6">
            <canvas id="chart_caracteristicas" height="140" width="140" style="margin: 5px 10px 10px 0"></canvas>
            <h4 style="margin:0">Top Caracteristicas</h4>
        </div>
        <div class="col-md-6">
            <canvas id="chart_atributos" height="140" width="140" style="margin: 5px 10px 10px 0"></canvas>
            <h4 style="margin:0">Top Atributos</h4>
        </div>
        <!--        <div class="col-md-4">
                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                    <h4 style="margin:0">Device Share</h4>
          </div>-->
    </div>
</div>

<script>

    function chart_caracteristicas() {
    var ctx = document.getElementById("chart_caracteristicas");
            var data = {
            datasets: [{
            data: [<?php
if (isset($morec[0])) {
    echo $morec[0][1];
}
?>
<?php
if (isset($morec[1])) {
    echo "," . $morec[1][1];
}
?>
<?php
if (isset($morec[2])) {
    echo "," . $morec[2][1];
}
?>
<?php
if (isset($morec[3])) {
    echo "," . $morec[3][1];
}
?>
<?php
if (isset($morec[4])) {
    echo "," . $morec[4][1];
}
?>],
                    backgroundColor:  [                             "#f44336",
                            "#3f51b5",
                            "#cddc39",
                            "#ffc107",
                            "#9c27b0"
                    ],
                    label: 'My dataset'
            }],
                    labels: [<?php
if (isset($morec[0])) {
    echo "'" . $morec[0][0] . " '";
}
?>
<?php
if (isset($morec[1])) {
    echo ",'" . $morec[1][0] . " '";
}
?>
<?php
if (isset($morec[2])) {
    echo ",'" . $morec[2][0] . " '";
}
?>
<?php
if (isset($morec[3])) {
    echo ",'" . $morec[3][0] . " '";
}
?>
<?php
if (isset($morec[4])) {
    echo ",'" . $morec[4][0] . " '";
}
?>]
            };
            var polarArea = new Chart(ctx, {
            data: data,
                    type: 'polarArea',
                    options: {
                    scale: {
                    ticks: {
                    beginAtZero: true
                    }
                    }
                    }
            });
    }
</script>

<script>

    function chart_atributos() {
    var ctx = document.getElementById("chart_atributos");
            var data = {
            datasets: [{
            data: [<?php
if (isset($morea[0])) {
    echo $morea[0][2];
}
?>
<?php
if (isset($morea[1])) {
    echo "," . $morea[1][2];
}
?>
<?php
if (isset($morea[2])) {
    echo "," . $morea[2][2];
}
?>
<?php
if (isset($morea[3])) {
    echo "," . $morea[3][2];
}
?>
<?php
if (isset($morea[4])) {
    echo "," . $morea[4][2];
}
?>],
                    backgroundColor:  [                             "#f44336",
                            "#3f51b5",
                            "#cddc39",
                            "#ffc107",
                            "#9c27b0"
                    ],
                    label: 'My dataset'
            }],
                    labels: [<?php
if (isset($morea[0])) {
    echo "'" . $morea[0][0] . " - " . $morea[0][1] . " '";
}
?>
<?php
if (isset($morea[1])) {
    echo ",'" . $morea[1][0] . " - " . $morea[1][1] . " '";
}
?>
<?php
if (isset($morea[2])) {
    echo ",'" . $morea[2][0] . " - " . $morea[2][1] . " '";
}
?>
<?php
if (isset($morea[3])) {
    echo ",'" . $morea[3][0] . " - " . $morea[3][1] . " '";
}
?>
<?php
if (isset($morea[4])) {
    echo ",'" . $morea[4][0] . " - " . $morea[4][1] . " '";
}
?>]
            };
            var polarArea = new Chart(ctx, {
            data: data,
                    type: 'polarArea',
                    options: {
                    scale: {
                    ticks: {
                    beginAtZero: true
                    }
                    }
                    }
            });
    }
</script>