<?php

include($_URL_CORE_ . 'controllers/libs/Base.php');

function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

if(!is_session_started()){
  session_start();
}



if (isset($_SESSION['tipo_usuario'])) {

  if (isset($_STATU_HOME_) && $_STATU_HOME_) {
    $_tipo_usuario_ = $_SESSION['tipo_usuario'];

    if ($_tipo_usuario_ == 1) {
      $href = $_URL_CORE_ . "views/admi/index.php";
    } else {
      $href = $_URL_CORE_ . "views/egresado/index.php";
    }

    echo "<script>
             location.href=" . "'$href';
           </script>";
  }
  
} else {
  if (isset($_STATU_LOGIN_) && $_STATU_LOGIN_) {
    $href = $_URL_CORE_ . "index.php";
    echo "<script>
           location.href=" . "'$href';
		     </script>";
  }
}
