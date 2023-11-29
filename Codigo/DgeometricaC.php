<?php include('head1.php'); ?>

<?php echo '<h3 style="text-align:center;">Ejemplo de distribucion geometrica para la cantidad de pasajeros que utilizan el transporte publico transporte público</h3>';?>

<?php 
$csvFile = 'datos1.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();

foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}

// Obtener un arreglo unidimensional de la tercera columna "pasajeros hombres al iniciar"
$data1 = array();
foreach ($data as $fila) {
    $data1[] = $fila[3];
}

// Obtener un arreglo unidimensional de la  cuarta columna "pasajeros mujeres al inicar"
$data2 = array();
foreach ($data as $fila) {
    $data2[] = $fila[4];
}

// Obtener un arreglo unidimensional de la septima columna "pasajeros de pie"
$data3 = array();
foreach ($data as $fila) {
    $data3[] = $fila[7];
}

// Inicializamos el cuarto arreglo para almacenar los datos de la suma "total de pasajeros"
$datos = array();

// Realizamos la suma de los valores de $data1 mas los de $data2
for ($i = 0; $i < count($data1); $i++) {
    $resultado = $data1[$i] + $data2[$i]+ $data3[$i];
    $datos[] = $resultado;
}

function calcularProbabilidad($dat, $valorDeseado) {
    // Contar la cantidad de elementos en el conjunto de datos menores o iguales al valor deseado
    $conteoExitos = 0;

    foreach ($dat as $dato) {
        if ($dato <= $valorDeseado) {
            $conteoExitos++;
        }
    }

    // Calcular la probabilidad
    $probabilidad = $conteoExitos / count($dat);

    return $probabilidad;
}

// Ejemplo de uso
$valorDeseado = 15; // Tiempo sobre el que se estima

// Calcular la probabilidad
$probabilidad = calcularProbabilidad($datos, $valorDeseado);


function distribucionGeometrica($p, $k) {
    // La fórmula de la distribución geométrica
    return pow(1 - $p, $k - 1) * $p;
}

// Datos del problema
$p = $probabilidad; // Probabilidad de que el tiempo de recorrido sea menor o igual a 30 minutos
$k = 5;   // Número de viajes

// Calcular la probabilidad para el número específico de viajes
$probabilidad1 = distribucionGeometrica($p, $k);

$datos = array (
    array(
        "Etiqueta" => "Exito",
        "Cantidad" => ($probabilidad1)*100
    ),
    array(
        "Etiqueta" => "No exito",
        "Cantidad" => ((($probabilidad1)*100)*-1)+100
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
        <i></i><br><br>
    </p>
</figure>


<!-- tabla que representa los calculos -->
<table class="table" id="tablaDatos">
        <thead>
            <th><?php echo "La probabilidad de que la variable deseada sea igual o menor a $valorDeseado es: " ?></th>
            <th><?php echo "La probabilidad de que el primer viaje en el que aborden 15 pasajeros o menos ocurra en exactamente 5 viajes: "?></th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $probabilidad?></td>
                <td><?php echo $probabilidad1?></td>
            </tr>
        </tbody>
    </table>

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