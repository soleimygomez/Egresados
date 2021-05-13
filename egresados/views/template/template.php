<?php

require_once($_URL_CORE_ . 'controllers/requests/validations/logueado.php');
include_once($_URL_CORE_ . 'controllers/libs/variable-sesion.php');



// ESTADO CONTROLADOR 
if ($_STATU_CONTROLLER_) {
    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        if (isset($_SESSION['controller'])) {
            $controller = $_SESSION['controller'];
            $action = $_SESSION['action'];

            echo $controller;
            echo $action;
        }
    }
}

// TEMPLATES HTML
require_once($_URL_CORE_ . 'views/template/header.php');
