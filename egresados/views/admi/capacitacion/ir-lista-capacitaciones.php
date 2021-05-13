<?php
session_start();

// CORE
$_SESSION['_URL_CORE_'] = "../../../";

// NAME
$_NAME_ = "Admi | Capacitaciones";
$_IS_SHOW_ = true;

// CONTROLADOR
$_STATU_CONTROLLER_ = true;
$_SESSION['controller'] = "capacitacion";
$_SESSION['action'] = "show";

$_STATU_LOGIN_ = true;
$_STATU_HOME_ = false;
// HTML
require_once('../../template/admi/template.php');

