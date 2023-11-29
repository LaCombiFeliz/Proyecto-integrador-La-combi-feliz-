<?php include('head1.php'); ?>

<?php echo '<h3 style="text-align:center;">Medidas de tendencia central para la relacion de pasajeros no estudiantes que utilizan el transporte público</h3>';?>


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

$data0 = array();
foreach ($data as $fila) {
    $data0[] = $fila[0];
}

// Inicializamos el cuarto arreglo para almacenar los datos de la suma "pasajeros que no son estudiantes"
$datos = array();
$titulos = array("Dia","Cantidad de personas");
$datosA = array();

// Realizamos la suma de los valores de $data1 mas los de $data2
for ($i = 0; $i < count($data1); $i++) {
    $resultado = $data1[$i] + $data2[$i]+ $data3[$i];
    $resul = $resultado-$data4[$i];
    $datos[] = $resul;
    $datosA[] = array("Dia"=>$data0[$i], "Cantidad"=>$resul);
}


//funcion que calcula la media 
function calcularMedia($datos) {
    $suma = array_sum($datos);
    $cantidad = count($datos);
    $media = $suma / $cantidad;
    return $media;
}
// calculo
$media = calcularMedia($datos);

//funcion que calcula la mediana
function calcularMediana($datos) {
    sort($datos);
    $cantidad = count($datos);

    if ($cantidad % 2 == 0) {
        // Si la cantidad de elementos es par, la mediana es el promedio de los dos valores centrales.
        $mediana = ($datos[($cantidad / 2) - 1] + $datos[$cantidad / 2]) / 2;
    } else {
        // Si la cantidad de elementos es impar, la mediana es el valor central.
        $mediana = $datos[($cantidad - 1) / 2];
    }

    return $mediana;
}
// calculo
$mediana = calcularMediana($datos);

//funcion que calcula la moda
function calcularModa($datos) {
    $frecuencias = array_count_values($datos);
    $moda = array_search(max($frecuencias), $frecuencias);
    return $moda;
}

// calculo
$moda = calcularModa($datos);   

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

// calculo fecha 1
$media1 = calcularMedia($fecha1);
$mediana1 = calcularMediana($fecha1);
$moda1 = calcularModa($fecha1);
// calculo fecha 2
$media2 = calcularMedia($fecha2);
$mediana2 = calcularMediana($fecha2);
$moda2 = calcularModa($fecha2);
// calculo fecha 3
$media3 = calcularMedia($fecha3);
$mediana3 = calcularMediana($fecha3);
$moda3 = calcularModa($fecha3);
// calculo fecha 4
$media4 = calcularMedia($fecha4);
$mediana4 = calcularMediana($fecha4);
$moda4 = calcularModa($fecha4);
// calculo fecha 5
$media5 = calcularMedia($fecha5);
$mediana5 = calcularMediana($fecha5);
$moda5 = calcularModa($fecha5);
// calculo fecha 6
$media6 = calcularMedia($fecha6);
$mediana6 = calcularMediana($fecha6);
$moda6 = calcularModa($fecha6);
// calculo fecha 7
$media7 = calcularMedia($fecha7);
$mediana7 = calcularMediana($fecha7);
$moda7 = calcularModa($fecha7);
// calculo fecha 8
$media8 = calcularMedia($fecha8);
$mediana8 = calcularMediana($fecha8);
$moda8 = calcularModa($fecha8);
// calculo fecha 9
$media9 = calcularMedia($fecha9);
$mediana9 = calcularMediana($fecha9);
$moda9 = calcularModa($fecha9);
// calculo fecha 10
$media10 = calcularMedia($fecha10);
$mediana10 = calcularMediana($fecha10);
$moda10 = calcularModa($fecha10);
?>

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
    .divContainer{
    width: 100%;
    height: 400px;
}
.otroContenedor {
    width: 100%;
    height: 200px;
}

.divIzquierdo{
    width: 48%;
    float: left;
    padding: 10px;
}

.divDerecho{
    width:48%;
    float: left;
    padding: 10px;
}
    </style>
</head>
<body>
<script src="code/highcharts.js"></script>
<script src="code/modules/data.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
<div id="container"></div>
</figure>

<style>
    #tablaDatos td {
        text-align: center; /* Centra el texto en las celdas de datos */
    }
    #tablaDatos th {
        text-align: center; /* Centra el texto en las celdas de datos */
    }
</style>

<style>
    #tablaDatos1 td {
        text-align: center; /* Centra el texto en las celdas de datos */
    }
    #tablaDatos1 th {
        text-align: center; /* Centra el texto en las celdas de datos */
    }
</style>

<!-- tabla que representa los datoss -->

<table  class="table table-striped" border="5" id="tablaDatos1">
    <thead>
    <?php for($i=0; $i<count($titulos);$i++): ?>
            <th><?php print $titulos[$i]; ?></th>
    <?php endfor ?>
    </thead> 
        <tbody>
        <?php foreach($datosA as $dato) :?>
            <tr>
                <th><?php print $dato['Dia']; ?></th>
                <td><?php print $dato['Cantidad'];?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
<script type="text/javascript">
    Highcharts.chart('container', {
    data: {
        table: 'tablaDatos1'
    },
    chart: {
        type: 'column'

    },
    title: {
        text: 'Pasajeros no estudiantes que utilizan el transporte público'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'min'
        }
    },
    series: [{
        color: '#800080' // Aquí puedes poner el color que prefieras
    }]
});
</script>

<figure class="highcharts-figure">
<div id="containerC"></div>
</figure>
  
<!-- tabla que representa los calculos -->
<table  class="table table-striped" border="5" id="tablaDatosC">
        <thead>
            <th>Fecha</th>
            <th>Media</th>
            <th>Mediana</th>
            <th>Moda</th>
        </thead>
        <tbody>
            <tr>
                <th>General</th>
                <td><?php echo $media?></td>
                <td><?php echo $mediana?></td>
                <td><?php echo $moda?></td>
            </tr>
            <tr>
                <th>06/11/23</th>
                <td><?php echo $media1?></td>
                <td><?php echo $mediana1?></td>
                <td><?php echo $moda1?></td>
            </tr>
            <tr>
                <th>07/11/23</th>
                <td><?php echo $media2?></td>
                <td><?php echo $mediana2?></td>
                <td><?php echo $moda2?></td>
            </tr>
            <tr>
                <th>08/11/23</th>
                <td><?php echo $media3?></td>
                <td><?php echo $mediana3?></td>
                <td><?php echo $moda3?></td>
            </tr>
            <tr>
                <th>09/11/23</th>
                <td><?php echo $media4?></td>
                <td><?php echo $mediana4?></td>
                <td><?php echo $moda4?></td>
            </tr>
            <tr>
                <th>10/11/23</th>
                <td><?php echo $media5?></td>
                <td><?php echo $mediana5?></td>
                <td><?php echo $moda5?></td>
            </tr>
            <tr>
                <th>13/11/23</th>
                <td><?php echo $media6?></td>
                <td><?php echo $mediana6?></td>
                <td><?php echo $moda6?></td>
            </tr>
            <tr>
                <th>14/11/23</th>
                <td><?php echo $media7?></td>
                <td><?php echo $mediana7?></td>
                <td><?php echo $moda7?></td>
            </tr>
            <tr>
                <th>15/11/23</th>
                <td><?php echo $media8?></td>
                <td><?php echo $mediana8?></td>
                <td><?php echo $moda8?></td>
            </tr>
            <tr>
                <th>16/11/23</th>
                <td><?php echo $media9?></td>
                <td><?php echo $mediana9?></td>
                <td><?php echo $moda9?></td>
            </tr>
            <tr>
                <th>17/11/23</th>
                <td><?php echo $media10?></td>
                <td><?php echo $mediana10?></td>
                <td><?php echo $moda10?></td>
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
        text: 'Medidas de tendencia central'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'p'
        }
    },
    series: [{
        color: '#0000FF' // Aquí puedes poner el color que prefieras
    }]
});
</script>
  

<figure class="highcharts-figure">
<div id="container1"></div>
</figure>


<!-- tabla que representa los calculos -->
<table border="5" class="table table-striped " id="tablaDatos">
        <thead>
            <th>Media</th>
            <th>Mediana</th>
            <th>Moda</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $media?></td>
                <td><?php echo $mediana?></td>
                <td><?php echo $moda?></td>
            </tr>
        </tbody>
</table>


<script type="text/javascript">
    Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Medidas de tendencia central general'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'p'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y:.1f} </b>'
    },
    series: [{
        name: 'Population',
        colors: [
            '#F6E576'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            ['Media', <?php echo $media; ?>],
            ['Mediana', <?php echo $mediana; ?>],
            ['Moda', <?php echo $moda; ?>]
        ],
        dataLabels: {
            enabled: true,
            rotation: 1,
            color: '#FFFFFF',
            align: 'center',
     
            y: 25, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script> 
</body>
</html>



    
<?php include('footer1.php') ?>