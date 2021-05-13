<?php

sleep(1);

if (
    isset($_POST['password']) &&
    isset($_POST['codigo'])
) {

    $clave_usuario = $_POST['password'];
    $codigo_usuario = $_POST['codigo'];

    $_URL_CORE="../../../";
    require_once ("../../libs/Base.php");
    require_once ("$_URL_CORE"."models/UsuarioModel.php");

    $usuario = new UsuarioModel();

    if ($usuario->newPassword($codigo_usuario, $clave_usuario)) {
        $title = "Se creo la contraseña.";
        $text = "Ya puedes iniciar sesión.";
        $footer = "Esta información es importante.";
        $alert = "success";

        echo json_encode(array(
            'error' => false,
            'change' => true,
            'login' => false,
            'title' => $title,
            'text' => $text,
            'alert' => $alert,
            'footer' => $footer,
            'codigo' => $codigo_usuario
        ));
    } else {
        $title = "No se puedo crear la contraseña.";
        $text = "Vuelva a intentarlo.";
        $footer = "Esta información es importante.";
        $alert = "error";

        echo json_encode(array(
            'error' => true,
            'change' => false,
            'login' => false,
            'title' => $title,
            'text' => $text,
            'alert' => $alert,
            'footer' => $footer,
            'codigo' => $codigo_usuario,
            'clave' => $clave_usuario
        ));
    }
} else {
    $title = "Faltaron campos en llenar.";
    $text = "Todos los campos son obligatorios.";
    $footer = "Esta información es importante.";
    $alert = "info";

    echo json_encode(array(
        'error' => true,
        'change' => false,
        'login' => false,
        'title' => $title,
        'text' => $text,
        'alert' => $alert,
        'footer' => $footer
    ));
}
