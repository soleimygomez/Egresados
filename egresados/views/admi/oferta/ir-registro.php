<?php
session_start();

// CORE
if (!isset($_SESSION['_URL_CORE_'])) {
	$_SESSION['_URL_CORE_'] = "../../../";
}

// NAME
$_NAME_ = "Admi | Agregar Oferta Empleo";
$_IS_SHOW_ = false;

// CONTROLADOR
$_STATU_CONTROLLER_ = true;
$_SESSION['controller'] = "oferta";
$_SESSION['action'] = "register";

$_SESSION['_URL_ASSETS_'] = "../../../";

// HTML
require_once('../../template/admi/template.php');
