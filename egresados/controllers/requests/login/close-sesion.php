<?php

require_once("../../libs/Base.php");

$db = new Base;
$db->query("UPDATE usuarios SET fecha_login=:fecha_login WHERE id=:id");
$db->bind(":id", $_SESSION['id_usuario']);
$db->bind(":fecha_login", date("Y-m-d H:i:s"));
$db->execute();

if (isset($_SESSION['tipo_usuario'])) {
    session_unset();
    session_destroy();
    if (!isset($_SESSION['tipo_usuario'])) {
        header("Location: ../../../index.php");
    }
}
