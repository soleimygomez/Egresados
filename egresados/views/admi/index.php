<?php


$_NAME_ = "Admi | Inicio";
$_URL_CORE_ = "../../";
$_URL_CORE_CONTROLLER_ = "";

/**
 * ESTADO
 */
$_STATU_LOGIN_ = true;
$_STATU_HOME_ = false;
$_STATU_CONTROLLER_ = true;

require_once($_URL_CORE_ . 'views/template/template.php');
require_once($_URL_CORE_ . 'views/template/admi/navbar.php');
require_once($_URL_CORE_ . 'views/template/admi/home.php');
require_once($_URL_CORE_ . 'views/template/footer.php');
?>

<script src="<?php echo $_URL_CORE_ ?>assets/js/peticiones.js"> </script>