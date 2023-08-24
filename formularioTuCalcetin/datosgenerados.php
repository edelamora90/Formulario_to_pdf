<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha_tucalcetin'];
    $conceptos = $_POST['concepto_tucalcetin'];
    $cantidades = $_POST['cantidad_tucalcetin'];
    $costos = $_POST['costo_tucalcetin'];
    $tiempo_estimado_tucalcetin = $_POST['tiempo_estimado_tucalcetin'];
    $notasAdicionales = $_POST['adicionales_tucalcetin'];
    $minimosDeOrden = $_POST['minimos_de_orden'];

    $data = [
        'fecha' => $fecha,
        'conceptos' => $conceptos,
        'cantidades' => $cantidades,
        'costos' => $costos,
        'tiempo_estimado_tucalcetin' => $tiempo_estimado_tucalcetin,
        'notasAdicionales' => $notasAdicionales,
        'minimosDeOrden' => $minimosDeOrden
    ];

    file_put_contents('datosTuCalcetin.php', '<?php return ' . var_export($data, true) . ';');
    //echo "Datos guardados con éxito!";
}
?>