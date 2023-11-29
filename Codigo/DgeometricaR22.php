<?php include('head1.php');

$csvFile = 'datos1.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();

foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}

// Obtener un arreglo unidimensional de la septima columna "pasajeros de pie"
$datos = array();
foreach ($data as $fila) {
    $datos[] = $fila[7];
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
$valorDeseado = 5; // Tiempo sobre el que se estima

// Calcular la probabilidad
$probabilidad = calcularProbabilidad($datos, $valorDeseado);


function distribucionGeometrica($p, $k) {
    // La fórmula de la distribución geométrica
    return pow(1 - $p, $k - 1) * $p;
}

// Datos del problema
$p = $probabilidad; // Probabilidad de que el tiempo de recorrido sea menor o igual a 30 minutos
$k = 21;   // Número de viajes

// Calcular la probabilidad para el número específico de viajes
$probabilidad1 = distribucionGeometrica($p, $k);


?>

?>
<!-- tabla que representa los datoss -->
<div class="row">
    <div class="col">
    </div>
    <div class="col-2">
    <table class="table" id="tablaDatos1">
    <thead>
        <th>No de pasajeros de pie</th>
    </thead>
        <tbody>
        <?php 
            for($i=0; $i<count($datos);$i++):?>
            <tr>
                <td><?php echo $datos[$i]?></td>
            </tr>
            <?php endfor?>
        </tbody>
    </table>
    </div>
    <div class="col">
    </div>  
</div>


<!-- tabla que representa los calculos -->
<table class="table" id="tablaDatos">
        <thead>
            <th><?php echo "La probabilidad de que la variable deseada sea igual o menor a $valorDeseado es: " ?></th>
            <th><?php echo "La probabilidad de que el primer viaje vayan 5 o menos pasajeros de pie ocurra en exactamente 21 viajes: "?></th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $probabilidad?></td>
                <td><?php echo $probabilidad1?></td>
            </tr>
        </tbody>
    </table>

<?php include('footer1.php') ?>