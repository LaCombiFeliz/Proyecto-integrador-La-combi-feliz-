<?php include('head1.php') ?>

<?php echo '<h3 style="text-align:center;">Ejemplo de distribucion geometrica para los tiempos de trayecto del transporte público</h3>';?>

<?php
function distribucionGeometrica($p, $k) {
    // Calcular la probabilidad P(X = k)
    $probabilidad = pow((1 - $p), ($k - 1)) * $p;
    return $probabilidad;
}

function probabilidadAcumulativa($p, $k) {
    // Calcular la probabilidad acumulativa P(X <= k)
    $probabilidadAcumulativa = 1 - pow((1 - $p), $k);
    return $probabilidadAcumulativa;
}

// Ejemplo de uso:
$probabilidadExito = 0.2;  // Probabilidad de éxito en un ensayo
$ensayo = 5;              // Número de ensayos

$probabilidadK = distribucionGeometrica($probabilidadExito, $ensayo);
$probabilidadAcumulativaK = probabilidadAcumulativa($probabilidadExito, $ensayo);

$datos = array (
    array(
        "Etiqueta" => "Exito",
        "Cantidad" => ($probabilidadAcumulativaK)*100
    ),
    array(
        "Etiqueta" => "No exito",
        "Cantidad" => ((($probabilidadAcumulativaK)*100)*-1)+100
    )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Agregado el enlace a la biblioteca Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        <i>Ejemplo:</i><br><br>
      <?php echo "La probabilidad de que el primer éxito ocurra en el ensayo $ensayo es: $probabilidadK\n";
echo "La probabilidad acumulativa de que el primer éxito ocurra en $ensayo o menos ensayos es: $probabilidadAcumulativaK\n";
?>
    </p>
</figure>

<script type="text/javascript">
    // Corregido el script de Highcharts
    Highcharts.chart('container', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Probabilidades'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Probabilidad',
            data: [
                <?php
                foreach ($datos as $dato) {
                    echo "['" . $dato['Etiqueta'] . "', " . $dato['Cantidad'] . "],";
                }
                ?>
            ]
        }]
    });
</script>
</body>
</html>

<?php include('footer1.php') ?>