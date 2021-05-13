<?php
sleep(1);

if (
    isset($_POST['codigo']) &&
    isset($_POST['email'])
) {

    $codigo_usuario = $_POST['codigo'];
    $email_usuario = $_POST['email'];

    $_URL_CORE="../../../";
    require_once ("../../libs/Base.php");
    require_once ("$_URL_CORE"."models/UsuarioModel.php");
    
    $usuario = new UsuarioModel();

    $result = $usuario->forgotPassword($email_usuario, $codigo_usuario);
    switch ($result) {
        case -1:
            $title = "Usuario NO registrado.";
            $text = "Si eres egresado, por favor registrase.";
            $footer = "Esta información es importante.";
            $alert = "error";

            echo json_encode(array(
                'error' => true,
                'title' => $title,
                'text' => $text,
                'alert' => $alert,
                'footer' => $footer,
                'estado' => $result
            ));
            break;
        case 0:
            $title = "Error al enviar el email.";
            $text = "Vuelva a intentarlo.";
            $footer = "Esta información es importante.";
            $alert = "error";

            echo json_encode(array(
                'error' => true,
                'title' => $title,
                'text' => $text,
                'alert' => $alert,
                'footer' => $footer,
                'estado' => $result
            ));
            break;
        case 1:
            $title = "Usuario Registrado.";
            $text = "Te hemos enviado un email con la clave.";
            $footer = "Esta información es importante.";
            $alert = "success";

            echo json_encode(array(
                'error' => false,
                'login' => false,
                'title' => $title,
                'text' => $text,
                'alert' => $alert,
                'footer' => $footer,
                'estado' => $result
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
                'footer' => $footer
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
        'footer' => $footer
    ));
}
