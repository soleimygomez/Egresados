<?php

sleep(1);

if (isset($_POST['codigo'])) {

    $codigo_usuario = $_POST['codigo'];

    $_URL_CORE="../../../";
    require_once ("../../libs/Base.php");
    require_once ("$_URL_CORE"."models/UsuarioModel.php");

    $usuario = new UsuarioModel();

    $resultado = $usuario->isRegistered($codigo_usuario);

    switch ($resultado) {
        case -1:
            $title = "No te encuentras registrado.";
            $text = "Acercate a tu plan de estudios.";
            $footer = "Esta información es importante.";
            $alert = "error";

            echo json_encode(array(
                'error' => true,
                'title' => $title,
                'text' => $text,
                'alert' => $alert,
                'footer' => $footer,
                'estado' => $resultado
            ));

            break;
        case 0:

            echo json_encode(array(
                'error' => false,
                'login' => false,
                'codigo_usuario' => $codigo_usuario,
                'estado' => $resultado
            ));

            break;
        case 1:

            $title = "Ya te encuentras registrado.";
            $text = "Inicia Sesión.";
            $footer = "Esta información es importante.";
            $alert = "success";

            echo json_encode(array(
                'error' => true,
                'title' => $title,
                'text' => $text,
                'alert' => $alert,
                'footer' => $footer,
                'estado' => $resultado
            ));

            break;
        default:
            $title = "Faltaron campos en llenar.";
            $text = "Todos los campos son obligatorios.";
            $footer = "Esta información es importante.";
            $alert = "info";

            echo json_encode(array(
                'error' => true,
                'title' => $title,
                'text' => $text,
                'alert' => $alert,
                'footer' => $footer,
                'estado' => -2
            ));
            break;
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
        'footer' => $footer,
        'estado' => -3
    ));
}
