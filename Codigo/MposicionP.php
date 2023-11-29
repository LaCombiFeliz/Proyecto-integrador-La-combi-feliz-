<?php include('head1.php');?>

<?php echo '<h3 style="text-align:center;">Medidas de posicion para relacion de pasajeros</h3>';?>

<?php
$csvFile = 'datos1.csv';
$csvData = file_get_contents($csvFile); 
$rows = str_getcsv($csvData, "\n");
$data = array();

foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}

// Obtener un arreglo unidimensional de la quinta columna "hombres al terminar"
$data1 = array();
foreach ($data as $fila) {
    $data1[] = $fila[5];
}

// Obtener un arreglo unidimensional de la  sexta columna "mujeres al terminar"
$data2 = array();
foreach ($data as $fila) {
    $data2[] = $fila[6];
}

// Obtener un arreglo unidimensional de la septima columna "pasajeros de pie"
$data3 = array();
foreach ($data as $fila) {
    $data3[] = $fila[7];
}

// Obtener un arreglo unidimensional de la octava columna "estudiantes"
$data4 = array();
foreach ($data as $fila) {
    $data4[] = $fila[8];
}

// Inicializamos el cuarto arreglo para almacenar los datos de la suma "pasajeros que no son estudiantes"
$datos = array();

// Realizamos la suma de los valores de $data1 mas los de $data2
for ($i = 0; $i < count($data1); $i++) {
    $resultado = $data1[$i] + $data2[$i]+ $data3[$i];
    $resul = $resultado-$data4[$i];
    $datos[] = $resul;
}

//funcion que calcula los percentiles 
function calcularPercentil($datos, $percentil) {
    sort($datos);
    $n = count($datos);
    $posicion = ($percentil / 100) * ($n + 1);

    if (is_float($posicion)) {
        $piso = floor($posicion);
        $techo = ceil($posicion);

        // Verificamos si estamos calculando el percentil 100
        if ($techo == $n + 1) {
            $percentilCalculado = $datos[$n - 1];
        } else {
            $percentilCalculado = $datos[$piso - 1] + (($posicion - $piso) * ($datos[$techo - 1] - $datos[$piso - 1]));
        }
    } else {
        $percentilCalculado = $datos[$posicion - 1];
    }

    return $percentilCalculado;
}
// calculo
$percentil = 98;
$resultado = calcularPercentil($datos, $percentil);



//funcion que calcula cuartiles 
function calcularCuartiles($datos) {
    sort($datos);
    $n = count($datos);

    $q1 = calcularPercentil($datos, 25);
    $q2 = calcularPercentil($datos, 50);
    $q3 = calcularPercentil($datos, 75);
    $q4 = calcularPercentil($datos, 99);

    return ["Q1" => $q1, "Q2" => $q2, "Q3" => $q3, "Q4" => $q4];
}
$datosdd = array (
    array(
        "Etiqueta" => "Q1",
        "Cantidad" => 2.25
    ),
    array(
        "Etiqueta" => "Q2",
        "Cantidad" => 4
    )
    ,
    array(
        "Etiqueta" => "Q3",
        "Cantidad" => 5
    )
    ,
    array(
        "Etiqueta" => "Q4",
        "Cantidad" => 9
    )
);

$datosddc = array (
    array(
        "Etiqueta" => "Percentil",
        "Cantidad" => $percentil
    ),
    array(
        "Etiqueta" => "Q2",
        "Cantidad" => (($percentil)*-1)+100
    )
);
// calculo
$cuartiles = calcularCuartiles($datos);

function calcular_deciles($datos) {
    // Ordenar el arreglo
    sort($datos);

    // Calcular los índices de los deciles
    $n = count($datos);
    $indices_deciles = [];
    for ($i = 1; $i <= 9; $i++) {
        $indices_deciles[] = round($i * ($n + 1) / 10) - 1;
    }
    $indices_deciles[] = $n - 1;  // Último índice para el último decil

    // Obtener los valores de los deciles
    $deciles = [];
    foreach ($indices_deciles as $indice) {
        $deciles[] = $datos[$indice];
    }

    return $deciles;
}

//Calculo

$resultado2 = calcular_deciles($datos);


//arreglo de las fechas
$data2 = array();
foreach ($data as $fila) {
    $data2[] = $fila[0];
}
//arreglos que contendran los valores de cada fecha
$fecha1=array();
$fecha2=array();
$fecha3=array();
$fecha4=array();
$fecha5=array();
$fecha6=array();
$fecha7=array();
$fecha8=array();
$fecha9=array();
$fecha10=array();


// Recorrer el arreglo "data2"
foreach ($data2 as $indice => $fecha) {
    // Verificar la fecha y almacenar en el arreglo correspondiente
    if ($fecha == '06/11/2023') {
        $fecha1[] = $datos[$indice];
    } elseif ($fecha == '07/11/2023') {
        $fecha2[] = $datos[$indice];
    }elseif ($fecha == '08/11/2023') {
        $fecha3[] = $datos[$indice];
    }elseif ($fecha == '09/11/2023') {
        $fecha4[] = $datos[$indice];
    }elseif ($fecha == '10/11/2023') {
        $fecha5[] = $datos[$indice];
    }elseif ($fecha == '13/11/2023') {
        $fecha6[] = $datos[$indice];
    }elseif ($fecha == '14/11/2023') {
        $fecha7[] = $datos[$indice];
    }elseif ($fecha == '15/11/2023') {
        $fecha8[] = $datos[$indice];
    }elseif ($fecha == '16/11/2023') {
        $fecha9[] = $datos[$indice];
    }elseif ($fecha == '17/11/2023') {
        $fecha10[] = $datos[$indice];
}
}

$percentil = 98;
// calculo fecha1
$percentiles1 = calcularPercentil($fecha1, $percentil);
$cuartiles1 = calcularCuartiles($fecha1);
$deciles1 = calcular_deciles($fecha1);
// calculo fecha2
$percentiles2 = calcularPercentil($fecha2, $percentil);
$cuartiles2 = calcularCuartiles($fecha2);
$deciles2 = calcular_deciles($fecha2);
// calculo fecha3
$percentiles3 = calcularPercentil($fecha3, $percentil);
$cuartiles3 = calcularCuartiles($fecha3);
$deciles3 = calcular_deciles($fecha3);
// calculo fecha4
$percentiles4 = calcularPercentil($fecha4, $percentil);
$cuartiles4 = calcularCuartiles($fecha4);
$deciles4 = calcular_deciles($fecha4);
// calculo fecha5
$percentiles5 = calcularPercentil($fecha5, $percentil);
$cuartiles5 = calcularCuartiles($fecha5);
$deciles5 = calcular_deciles($fecha5);
// calculo fecha6
$percentiles6 = calcularPercentil($fecha6, $percentil);
$cuartiles6 = calcularCuartiles($fecha6);
$deciles6 = calcular_deciles($fecha6);
// calculo fecha7
$percentiles7 = calcularPercentil($fecha7, $percentil);
$cuartiles7 = calcularCuartiles($fecha7);
$deciles7 = calcular_deciles($fecha7);
// calculo fecha8
$percentiles8 = calcularPercentil($fecha8, $percentil);
$cuartiles8 = calcularCuartiles($fecha8);
$deciles8 = calcular_deciles($fecha8);
// calculo fecha9
$percentiles9 = calcularPercentil($fecha9, $percentil);
$cuartiles9 = calcularCuartiles($fecha9);
$deciles9 = calcular_deciles($fecha9);
// calculo fecha10
$percentiles10 = calcularPercentil($fecha10, $percentil);
$cuartiles10 = calcularCuartiles($fecha10);
$deciles10 = calcular_deciles($fecha10);



?>

<?php

$datosddE = array (
    array(
        "Etiqueta" => "D1",
        "Cantidad" => $resultado2[0]
    ),
    array(
        "Etiqueta" => "D2",
        "Cantidad" => $resultado2[1]
    )
    ,
    array(
        "Etiqueta" => "D3",
        "Cantidad" => $resultado2[2]
    )
    ,
    array(
        "Etiqueta" => "D4",
        "Cantidad" => $resultado2[3]
    ),
    array(
        "Etiqueta" => "D5",
        "Cantidad" => $resultado2[4]
    ),
    array(
        "Etiqueta" => "D6",
        "Cantidad" => $resultado2[5]
    ),
    array(
        "Etiqueta" => "D7",
        "Cantidad" => $resultado2[6]
    ),
    array(
        "Etiqueta" => "D8",
        "Cantidad" => $resultado2[7]
    ),
    array(
        "Etiqueta" => "D9",
        "Cantidad" => $resultado2[8]
    ),
    array(
        "Etiqueta" => "D10",
        "Cantidad" => $resultado2[9]
    )
);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<script src="code/highcharts.js"></script>
<script src="code/highcharts-3d.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
    </p>
</figure>

<!-- tabla que representa los calculos -->
<table  id="tablaDatos"  border="5" class="table table-striped">
        <thead>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $cuartiles["Q1"]?></td>
                <td><?php echo $cuartiles["Q2"]?></td>
                <td><?php echo $cuartiles["Q3"]?></td>
                <td><?php echo $cuartiles["Q4"]?></td>
            </tr>
        </tbody>
    </table>

    <figure class="highcharts-figure">
    <div id="container2"></div>
    <p class="highcharts-description">
    </p>
</figure>

    <!-- tabla que representa los calculos -->
<table id="tablaDatos"  border="5" class="table table-striped">
        <thead>
       
        </thead>
        <tbody>
            <tr>
                <th>Percentiles</th>
                <td > <?php echo "El $percentil% de los datos está por debajo de: " . $resultado; ?></td>
            </tr>
        </tbody>
    </table>

    <figure class="highcharts-figure">
    <div id="container3"></div>
    <p class="highcharts-description">
    </p>
</figure>

     <!-- tabla que representa los calculos de deciles -->
     <table id="tablaDatos2"  border="5" class="table table-striped">
        <thead>
            <th>D1</th>
            <th>D2</th>
            <th>D3</th>
            <th>D4</th>
            <th>D5</th>
            <th>D6</th>
            <th>D7</th>
            <th>D8</th>
            <th>D9</th>
            <th>D10</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $resultado2[0]?></td>
                <td><?php echo $resultado2[1]?></td>
                <td><?php echo $resultado2[2]?></td>
                <td><?php echo $resultado2[3]?></td>
                <td><?php echo $resultado2[4]?></td>
                <td><?php echo $resultado2[5]?></td>
                <td><?php echo $resultado2[6]?></td>
                <td><?php echo $resultado2[7]?></td>
                <td><?php echo $resultado2[8]?></td>
                <td><?php echo $resultado2[9]?></td>
            </tr> 
            </tbody>
    </table>


<script type="text/javascript">
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
        text: 'Cuartiles',
        align: 'center'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
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
        name: 'Valor',
        data: [
<?php 
    foreach($datosdd as $dato){
        echo '['."'". $dato['Etiqueta'] ."'". ',' . $dato['Cantidad'] . '],';
    }
?>
        ]
    }]
});

</script> 



<script type="text/javascript">
Highcharts.chart('container2', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Percentil',
        align: 'center'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
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
        name: 'Valor',
        data: [
<?php 
    foreach($datosddc as $dato){
        echo '['."'". $dato['Etiqueta'] ."'". ',' . $dato['Cantidad'] . '],';
    }
?>
        ]
    }]
});

</script>

<script type="text/javascript">
Highcharts.chart('container3', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Deciles',
        align: 'center'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
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
        name: 'Valor',
        data: [
<?php 
    foreach($datosddE as $dato){
        echo '['."'". $dato['Etiqueta'] ."'". ',' . $dato['Cantidad'] . '],';
    }
?>
        ]
    }]
});

</script> 

<script src="code/highcharts.js"></script>
<script src="code/modules/data.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
<div id="containerC1"></div>
</figure>

<!-- tabla que representa los calculos -->
<table class="table" id="tablaDatosCC">
        <thead>
            <th>Fecha</th>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>
        </thead>
        <tbody>
            <tr>
                <th>General</th>
                <td><?php echo $cuartiles["Q1"]?></td>
                <td><?php echo $cuartiles["Q2"]?></td>
                <td><?php echo $cuartiles["Q3"]?></td>
                <td><?php echo $cuartiles["Q4"]?></td>
            </tr>
            <tr>
                <th>06/11/23</th>
                <td><?php echo $cuartiles1["Q1"]?></td>
                <td><?php echo $cuartiles1["Q2"]?></td>
                <td><?php echo $cuartiles1["Q3"]?></td>
                <td><?php echo $cuartiles1["Q4"]?></td>
            </tr>
            <tr>
                <th>07/11/23</th>
                <td><?php echo $cuartiles2["Q1"]?></td>
                <td><?php echo $cuartiles2["Q2"]?></td>
                <td><?php echo $cuartiles2["Q3"]?></td>
                <td><?php echo $cuartiles2["Q4"]?></td>
                </tr>
</tr>
            <tr>
            <th>08/11/23</th>
            <td><?php echo $cuartiles3["Q1"]?></td>
            <td><?php echo $cuartiles3["Q2"]?></td>
            <td><?php echo $cuartiles3["Q3"]?></td>
            <td><?php echo $cuartiles3["Q4"]?></td>
            </tr>
            <tr>
            <th>09/11/23</th>
            <td><?php echo $cuartiles4["Q1"]?></td>
            <td><?php echo $cuartiles4["Q2"]?></td>
            <td><?php echo $cuartiles4["Q3"]?></td>
            <td><?php echo $cuartiles4["Q4"]?></td>
            </tr>
            <tr>
            <th>10/11/23</th>
            <td><?php echo $cuartiles5["Q1"]?></td>
            <td><?php echo $cuartiles5["Q2"]?></td>
            <td><?php echo $cuartiles5["Q3"]?></td>
            <td><?php echo $cuartiles5["Q4"]?></td>
            </tr>
            <tr>
            <th>13/11/23</th>
            <td><?php echo $cuartiles6["Q1"]?></td>
            <td><?php echo $cuartiles6["Q2"]?></td>
            <td><?php echo $cuartiles6["Q3"]?></td>
            <td><?php echo $cuartiles6["Q4"]?></td>
            </tr>
            <tr>
            <th>14/11/23</th>
            <td><?php echo $cuartiles7["Q1"]?></td>
            <td><?php echo $cuartiles7["Q2"]?></td>
            <td><?php echo $cuartiles7["Q3"]?></td>
            <td><?php echo $cuartiles7["Q4"]?></td>
            </tr>
            <tr>
            <th>15/11/23</th>
            <td><?php echo $cuartiles8["Q1"]?></td>
            <td><?php echo $cuartiles8["Q2"]?></td>
            <td><?php echo $cuartiles8["Q3"]?></td>
            <td><?php echo $cuartiles8["Q4"]?></td>
            </tr>
            <tr>
            <th>16/11/23</th>
            <td><?php echo $cuartiles9["Q1"]?></td>
            <td><?php echo $cuartiles9["Q2"]?></td>
            <td><?php echo $cuartiles9["Q3"]?></td>
            <td><?php echo $cuartiles9["Q4"]?></td>
            </tr>
            <tr>
            <th>17/11/23</th>
            <td><?php echo $cuartiles10["Q1"]?></td>
            <td><?php echo $cuartiles10["Q2"]?></td>
            <td><?php echo $cuartiles10["Q3"]?></td>
            <td><?php echo $cuartiles10["Q4"]?></td>
            </tr>
</table>

<script type="text/javascript">
    Highcharts.chart('containerC1', {
    data: {
        table: 'tablaDatosCC'
    },
    chart: {
        type: 'column'

    },
    title: {
        text: 'Cuartiles por dia'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: true,
        title: {
            text: 'min'
        }
    },
    series: [{
        color: '#0000FF' // Aquí puedes poner el color que prefieras
    }]
});
</script>

<script src="code/highcharts.js"></script>
<script src="code/modules/data.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
<div id="containerC12"></div>
</figure>


    

    <table class="table" id="tablaDatos223">
            <th>Fecha</th>
                <th> Valor por debajo</th>
               
            </tr>
            </tr>
                <th>06/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo  $percentiles1; ?></td>
            </tr>
            </tr>
                <th>07/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo  $percentiles2; ?></td>
            </tr>
            </tr>
                <th>08/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo  $percentiles3; ?></td>
            </tr>
            </tr>
                <th>09/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo  $percentiles4; ?></td>
            </tr>
            </tr>
                <th>10/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo  $percentiles5; ?></td>
            </tr>
            </tr>
                <th>13/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo $percentiles6; ?></td>
            </tr>
            </tr>
                <th>14/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo $percentiles7; ?></td>
            </tr>
            </tr>
                <th>15/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo $percentiles8; ?></td>
            </tr>
            </tr>
                <th>16/11/23 P<?php echo$percentil ?></th>
                <td > <?php echo $percentiles9; ?></td>
            </tr>
            </tr>
                <th>17/11/23 P<?php echo $percentil ?></th>
                <td > <?php echo $percentiles10; ?></td>
            </tr>
        </tbody>
    </table>

    <script type="text/javascript">
    Highcharts.chart('containerC12', {
    data: {
        table: 'tablaDatos223'
    },
    chart: {
        type: 'column'

    },
    title: {
        text: 'Percentiles por dia'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: true,
        title: {
            text: 'min'
        }
    },
    series: [{
        color: '#0000FF' // Aquí puedes poner el color que prefieras
    }]
});
</script>

<script src="code/highcharts.js"></script>
<script src="code/modules/data.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
<div id="containerC123"></div>
</figure>


    <table class="table" id="tablaDatos2233">
        <thead>
            <th>Fecha</th>
            <th>D1</th>
            <th>D2</th>
            <th>D3</th>
            <th>D4</th>
            <th>D5</th>
            <th>D6</th>
            <th>D7</th>
            <th>D8</th>
            <th>D9</th>
            <th>D10</th>
        </thead>
        <tbody>
            <tr>
                <th>General</th>
                <td><?php echo $resultado2[0]?></td>
                <td><?php echo $resultado2[1]?></td>
                <td><?php echo $resultado2[2]?></td>
                <td><?php echo $resultado2[3]?></td>
                <td><?php echo $resultado2[4]?></td>
                <td><?php echo $resultado2[5]?></td>
                <td><?php echo $resultado2[6]?></td>
                <td><?php echo $resultado2[7]?></td>
                <td><?php echo $resultado2[8]?></td>
                <td><?php echo $resultado2[9]?></td>
            </tr>
            <tr>
                <th>06/11/23</th>
                <td><?php echo $deciles1[0]?></td>
                <td><?php echo $deciles1[1]?></td>
                <td><?php echo $deciles1[2]?></td>
                <td><?php echo $deciles1[3]?></td>
                <td><?php echo $deciles1[4]?></td>
                <td><?php echo $deciles1[5]?></td>
                <td><?php echo $deciles1[6]?></td>
                <td><?php echo $deciles1[7]?></td>
                <td><?php echo $deciles1[8]?></td>
                <td><?php echo $deciles1[9]?></td>
            </tr> 
            <tr>
                <th>07/11/23</th>
                <td><?php echo $deciles2[0]?></td>
                <td><?php echo $deciles2[1]?></td>
                <td><?php echo $deciles2[2]?></td>
                <td><?php echo $deciles2[3]?></td>
                <td><?php echo $deciles2[4]?></td>
                <td><?php echo $deciles2[5]?></td>
                <td><?php echo $deciles2[6]?></td>
                <td><?php echo $deciles2[7]?></td>
                <td><?php echo $deciles2[8]?></td>
                <td><?php echo $deciles2[9]?></td>
            </tr> 
            <tr>
                <th>08/11/23</th>
                <td><?php echo $deciles3[0]?></td>
                <td><?php echo $deciles3[1]?></td>
                <td><?php echo $deciles3[2]?></td>
                <td><?php echo $deciles3[3]?></td>
                <td><?php echo $deciles3[4]?></td>
                <td><?php echo $deciles3[5]?></td>
                <td><?php echo $deciles3[6]?></td>
                <td><?php echo $deciles3[7]?></td>
                <td><?php echo $deciles3[8]?></td>
                <td><?php echo $deciles3[9]?></td>
            </tr> 
            <tr>
                <th>09/11/23</th>
                <td><?php echo $deciles4[0]?></td>
                <td><?php echo $deciles4[1]?></td>
                <td><?php echo $deciles4[2]?></td>
                <td><?php echo $deciles4[3]?></td>
                <td><?php echo $deciles4[4]?></td>
                <td><?php echo $deciles4[5]?></td>
                <td><?php echo $deciles4[6]?></td>
                <td><?php echo $deciles4[7]?></td>
                <td><?php echo $deciles4[8]?></td>
                <td><?php echo $deciles4[9]?></td>
            </tr> 
            <tr>
                <th>10/11/23</th>
                <td><?php echo $deciles5[0]?></td>
                <td><?php echo $deciles5[1]?></td>
                <td><?php echo $deciles5[2]?></td>
                <td><?php echo $deciles5[3]?></td>
                <td><?php echo $deciles5[4]?></td>
                <td><?php echo $deciles5[5]?></td>
                <td><?php echo $deciles5[6]?></td>
                <td><?php echo $deciles5[7]?></td>
                <td><?php echo $deciles5[8]?></td>
                <td><?php echo $deciles5[9]?></td>
            </tr> 
            <tr>
                <th>13/11/23</th>
                <td><?php echo $deciles6[0]?></td>
                <td><?php echo $deciles6[1]?></td>
                <td><?php echo $deciles6[2]?></td>
                <td><?php echo $deciles6[3]?></td>
                <td><?php echo $deciles6[4]?></td>
                <td><?php echo $deciles6[5]?></td>
                <td><?php echo $deciles6[6]?></td>
                <td><?php echo $deciles6[7]?></td>
                <td><?php echo $deciles6[8]?></td>
                <td><?php echo $deciles6[9]?></td>
            </tr> 
            <tr>
                <th>14/11/23</th>
                <td><?php echo $deciles7[0]?></td>
                <td><?php echo $deciles7[1]?></td>
                <td><?php echo $deciles7[2]?></td>
                <td><?php echo $deciles7[3]?></td>
                <td><?php echo $deciles7[4]?></td>
                <td><?php echo $deciles7[5]?></td>
                <td><?php echo $deciles7[6]?></td>
                <td><?php echo $deciles7[7]?></td>
                <td><?php echo $deciles7[8]?></td>
                <td><?php echo $deciles7[9]?></td>
            </tr> 
            <tr>
                <th>15/11/23</th>
                <td><?php echo $deciles8[0]?></td>
                <td><?php echo $deciles8[1]?></td>
                <td><?php echo $deciles8[2]?></td>
                <td><?php echo $deciles8[3]?></td>
                <td><?php echo $deciles8[4]?></td>
                <td><?php echo $deciles8[5]?></td>
                <td><?php echo $deciles8[6]?></td>
                <td><?php echo $deciles8[7]?></td>
                <td><?php echo $deciles8[8]?></td>
                <td><?php echo $deciles8[9]?></td>
            </tr>
            <tr>
                <th>16/11/23</th>
                <td><?php echo $deciles9[0]?></td>
                <td><?php echo $deciles9[1]?></td>
                <td><?php echo $deciles9[2]?></td>
                <td><?php echo $deciles9[3]?></td>
                <td><?php echo $deciles9[4]?></td>
                <td><?php echo $deciles9[5]?></td>
                <td><?php echo $deciles9[6]?></td>
                <td><?php echo $deciles9[7]?></td>
                <td><?php echo $deciles9[8]?></td>
                <td><?php echo $deciles9[9]?></td>
            </tr> 
            <tr>
                <th>17/11/23</th>
                <td><?php echo $deciles10[0]?></td>
                <td><?php echo $deciles10[1]?></td>
                <td><?php echo $deciles10[2]?></td>
                <td><?php echo $deciles10[3]?></td>
                <td><?php echo $deciles10[4]?></td>
                <td><?php echo $deciles10[5]?></td>
                <td><?php echo $deciles10[6]?></td>
                <td><?php echo $deciles10[7]?></td>
                <td><?php echo $deciles10[8]?></td>
                <td><?php echo $deciles10[9]?></td>
            </tr> 

            </tbody>
</table>

<script type="text/javascript">
    Highcharts.chart('containerC123', {
    data: {
        table: 'tablaDatos2233'
    },
    chart: {
        type: 'column'

    },
    title: {
        text: 'Deciles por dia'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: true,
        title: {
            text: 'min'
        }
    },
    series: [{
        color: '#0000FF' // Aquí puedes poner el color que prefieras
    }]
});
</script>   

</html>




<?php include('footer1.php') ?>