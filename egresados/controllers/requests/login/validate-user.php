<?php
sleep(1);

if (
    isset($_POST['codigo']) &&
    isset($_POST['password']) &&
    isset($_POST['tipo_usuario'])
) {
    $codigo_usuario = $_POST['codigo'];
    $clave_usuario = $_POST['password'];
    $tipo_usuario = $_POST['tipo_usuario'];

    $_URL_CORE="../../../";
    require_once ("../../libs/Base.php");
    require_once ("$_URL_CORE"."models/UsuarioModel.php");
    
    $usuario = new UsuarioModel();

    if ($usuario->userExists($codigo_usuario, $clave_usuario, $tipo_usuario)) {

        // STORE SESSION VARIABLES
        $_SESSION['id_usuario'] = $usuario->getId();
        $_SESSION['codigo_usuario'] = $usuario->getCodigo();
        $_SESSION['nombre_usuario'] = $usuario->getNombre();
        $_SESSION['tipo_usuario'] = $tipo_usuario;
        $_SESSION['fecha_login_usuario'] = $usuario->getFechaLogin();
        $_SESSION['actualizado_usuario'] = $usuario->getActualizado();

        echo json_encode(array(
            'error' => false,
            'nombre_usuario' => $usuario->getNombre(),
            'tipo_usuario' => $tipo_usuario,
            'codigo_usuario'  => $codigo_usuario
        ));
    } else {
        // NO HA DIGITADO TODOS LOS CAMPOS
        $title = "Datos Incorrectos.";
        $text = "La información ingresada no es validas.";
        $footer = "Esta información es importante.";
        $alert = "error";

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
