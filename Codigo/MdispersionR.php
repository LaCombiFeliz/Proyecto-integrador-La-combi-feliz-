<?php include('head1.php');

$csvFile = 'datos1.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();

foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}

// Obtener un arreglo unidimensional de la septima columna "pasajeros de pie"
$data1 = array();
foreach ($data as $fila) {
    $data1[] = $fila[7];
}

//Este arreglo obtiene las fechas
$data0 = array();
foreach ($data as $fila) {
    $data0[] = $fila[0];
}
$datos = array();
$datosC = [];
$datosB = [];

// Realizamos la suma de los valores de $data1 mas los de $data2
for ($i = 0; $i < count($data1); $i++) {
    $resul = $data1[$i] + 0 ;

    $datos[] = $resul;
    $datosC[] = array("Dia"=>$data0[$i]);
    $datosB[] = array("Tiempo"=>$resul);
}


//funcion que calcula el rango 
function calcularRango($datos) {
    $minimo = min($datos);
    $maximo = max($datos);
    $rango = $maximo - $minimo;
    return $rango;
}
// calculo
$rango = calcularRango($datos);


//funcion que calcula la varianza
function calcularVarianza($datos) {
    $n = count($datos);
    $media = array_sum($datos) / $n;
    $sumatorio = 0;

    foreach ($datos as $valor) {
        $sumatorio += pow($valor - $media, 2);
    }

    $varianza = $sumatorio / $n;
    return $varianza;
}
// calculo
$varianza = calcularVarianza($datos);


//funcion que calcula la desviacion estandar
function calcularDesviacionEstandar($datos) {
    $varianza = calcularVarianza($datos);
    $desviacionEstandar = sqrt($varianza);
    return $desviacionEstandar;
}
// calculo
$desviacionEstandar = calcularDesviacionEstandar($datos);



//funcion que calcula la media 
function calcularMedia($datos) {
    $suma = array_sum($datos);
    $cantidad = count($datos);
    $media = $suma / $cantidad;
    return $media;
}
// calculo
$media = calcularMedia($datos);

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



// calculo fecha1
$rango1 = calcularRango($fecha1);
$varianza1 = calcularVarianza($fecha1);
$desviacionEstandar1 = calcularDesviacionEstandar($fecha1);
// calculo fecha2
$rango2 = calcularRango($fecha2);
$varianza2 = calcularVarianza($fecha2);
$desviacionEstandar2 = calcularDesviacionEstandar($fecha2);
// calculo fecha3
$rango3 = calcularRango($fecha3);
$varianza3 = calcularVarianza($fecha3);
$desviacionEstandar3 = calcularDesviacionEstandar($fecha3);
// calculo fecha4
$rango4 = calcularRango($fecha4);
$varianza4 = calcularVarianza($fecha4);
$desviacionEstandar4 = calcularDesviacionEstandar($fecha4);
// calculo fecha5
$rango5 = calcularRango($fecha5);
$varianza5 = calcularVarianza($fecha5);
$desviacionEstandar5 = calcularDesviacionEstandar($fecha5);
// calculo fecha6
$rango6 = calcularRango($fecha6);
$varianza6 = calcularVarianza($fecha6);
$desviacionEstandar6 = calcularDesviacionEstandar($fecha6);
// calculo fecha7
$rango7 = calcularRango($fecha7);
$varianza7 = calcularVarianza($fecha7);
$desviacionEstandar7 = calcularDesviacionEstandar($fecha7);
// calculo fecha8
$rango8 = calcularRango($fecha8);
$varianza8 = calcularVarianza($fecha8);
$desviacionEstandar8 = calcularDesviacionEstandar($fecha8);
// calculo fecha9
$rango9 = calcularRango($fecha9);
$varianza9 = calcularVarianza($fecha9);
$desviacionEstandar9 = calcularDesviacionEstandar($fecha9);
// calculo fecha10
$rango10 = calcularRango($fecha10);
$varianza10 = calcularVarianza($fecha10);
$desviacionEstandar10 = calcularDesviacionEstandar($fecha10);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
    </p>
</figure>

<?php 
$categorias = array();
foreach($datosC as $dato) {
    $categorias[] = $dato['Dia'];
    
}
$categorias_json = json_encode($categorias);
?>

<?php 
$datos = [];
foreach($datosB as $dato) {
    $datos[] = $dato['Tiempo'];
}

$datos_json = json_encode($datos);
?>

<?php 
$media_array = array_fill(0, count($datos), $media);
$media_json = json_encode($media_array);
?>

<?php 
$media_mas_desviacion = $media + $desviacionEstandar;
$media_mas_desviacion_array = array_fill(0, count($datos), $media_mas_desviacion);
$media_mas_desviacion_json = json_encode($media_mas_desviacion_array);
?>

<?php 
$media_menos_desviacion = $media - $desviacionEstandar;
$media_menos_desviacion_array = array_fill(0, count($datos), $media_menos_desviacion);
$media_menos_desviacion_json = json_encode($media_menos_desviacion_array);
?>

    <!-- tabla que representa los datoss -->

    <table class="table" id="tablaDatos1">
    <thead>
        <th>No de pasajeros de pie</th>
    </thead>
        <tbody>
        <?php for($i=0; $i<count($datos);$i++):?>
            <tr>
                <td><?php echo $datos[$i]?></td>
            </tr>
            <?php endfor?>
        </tbody>
    </table>
 

<!-- tabla que representa los calculos -->
<table class="table" id="tablaDatos">
        <thead>
            <th>Rango</th>
            <th>Varianza</th>
            <th>Desviación estándar</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $rango?></td>
                <td><?php echo $varianza?></td>
                <td><?php echo $desviacionEstandar?></td>
            </tr>
        </tbody>
    </table>
    
    <script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Medidas de dispersion para la relacion de asientos'
    },
    subtitle: {
        text: ' ' +
            '<a href="" ' +
            'target="_blank"></a>'
    },
    xAxis: {
        categories: <?php echo $categorias_json; ?>
    },
    yAxis: {
        title: {
            text: 'Personas de pie'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Tiempo',
        data: <?php echo $datos_json; ?>
    },{
        name: 'Media',
        data: <?php echo $media_json; ?>
    },{
        name: 'Media + Desviación Estándar',
        data: <?php echo $media_mas_desviacion_json; ?>
    },{
        name: 'Media - Desviación Estándar',
        data: <?php echo $media_menos_desviacion_json; ?>
    }]
});

</script>

<script src="code/highcharts.js"></script>
<script src="code/modules/data.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
<div id="containerC"></div>
</figure>


    <!-- tabla que representa los calculos -->
<table class="table" id="tablaDatosC">
        <thead>
            <th>Fecha</th>
            <th>Rango</th>
            <th>Varianza</th>
            <th>Desviación estándar</th>
        </thead>
        <tbody>
            <tr>
                <th>General</th>
                <td><?php echo $rango?></td>
                <td><?php echo $varianza?></td>
                <td><?php echo $desviacionEstandar?></td>
            </tr>
            <tr>
                <th>06/11/23</th>
                <td><?php echo $rango1?></td>
                <td><?php echo $varianza1?></td>
                <td><?php echo $desviacionEstandar1?></td>
            </tr>
            <tr>
                <th>07/11/23</th>
                <td><?php echo $rango2?></td>
                <td><?php echo $varianza2?></td>
                <td><?php echo $desviacionEstandar2?></td>
            </tr>
            <tr>
                <th>08/11/23</th>
                <td><?php echo $rango3?></td>
                <td><?php echo $varianza3?></td>
                <td><?php echo $desviacionEstandar3?></td>
            </tr>
            <tr>
                <th>09/11/23</th>
                <td><?php echo $rango4?></td>
                <td><?php echo $varianza4?></td>
                <td><?php echo $desviacionEstandar4?></td>
            </tr>
            <tr>
                <th>10/11/23</th>
                <td><?php echo $rango5?></td>
                <td><?php echo $varianza5?></td>
                <td><?php echo $desviacionEstandar5?></td>
            </tr>
            <tr>
                <th>13/11/23</th>
                <td><?php echo $rango6?></td>
                <td><?php echo $varianza6?></td>
                <td><?php echo $desviacionEstandar6?></td>
            </tr>
            <tr>
                <th>14/11/23</th>
                <td><?php echo $rango7?></td>
                <td><?php echo $varianza7?></td>
                <td><?php echo $desviacionEstandar7?></td>
            </tr>
            <tr>
                <th>15/11/23</th>
                <td><?php echo $rango8?></td>
                <td><?php echo $varianza8?></td>
                <td><?php echo $desviacionEstandar8?></td>
            </tr><tr>
                <th>16/11/23</th>
                <td><?php echo $rango9?></td>
                <td><?php echo $varianza9?></td>
                <td><?php echo $desviacionEstandar9?></td>
            </tr><tr>
                <th>17/11/23</th>
                <td><?php echo $rango10?></td>
                <td><?php echo $varianza10?></td>
                <td><?php echo $desviacionEstandar10?></td>
            </tr>
        </tbody>
</table>

<script type="text/javascript">
    Highcharts.chart('containerC', {
    data: {
        table: 'tablaDatosC'
    },
    chart: {
        type: 'column'

    },
    title: {
        text: 'Medidas de dispersion para cada dia'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Personas de pie'
        }
    },
    series: [{
        color: '#0000FF' // Aquí puedes poner el color que prefieras
    }]
});
</script>

</body>
</html>

<?php include('footer1.php') ?>
