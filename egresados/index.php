<?php 

$_NAME_ = "Egresados | Login";
$_URL_CORE_ = "";
$_URL_CORE_CONTROLLER_ = "";


/**
 * ESTADO
 */
$_STATU_LOGIN_=false;
$_STATU_HOME_=true;

require_once($_URL_CORE_.'controllers/requests/validations/logueado.php');
require_once($_URL_CORE_.'views/template/header.php');
require_once($_URL_CORE_.'views/login.php');