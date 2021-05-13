<?php


if (isset($_POST['desde_fecha']) && isset($_POST['hasta_fecha'])) {
    
    $desde = $_POST['desde_fecha'];
    $hasta = $_POST['hasta_fecha'];

    $_URL_CORE = "../../../";
    require_once("../../libs/Base.php");
    require_once("$_URL_CORE" . "models/CapacitacionModel.php");

    $capacitacion = new CapacitacionModel();
    $capacitaciones = $capacitacion->reportsCapacitacion($desde, $hasta);

    if ($capacitaciones != null) {
        echo json_encode(array(
            'capacitaciones' => json_encode($capacitaciones),
            'error' => false
        ));
    } else {
        $title = "No se encontraron resultados";
        $text = "Rango $desde a $hasta";
        $footer = "0 resultados";
        $alert = "info";

        echo json_encode(array(
            'error' => true,
            'title' => $title,
            'text' => $text,
            'alert' => $alert,
            'footer' => $footer
        ));
    }
} else {
    $title = "Faltaron campos en llenar.";
    $text = "Todos los campos son obligatorios.";
    $footer = "Esta información es importante.";
    $alert = "info";

    echo json_encode(array(
        'error' => true,
        'title' => $title,
        'text' => $text,
        'alert' => $alert,
        'footer' => $footer
    ));
}
