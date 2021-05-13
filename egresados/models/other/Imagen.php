<?php 

class Imagen{

    function __construct()
    {
        
    }

    static function imagen(){
        if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
			$_SESSION['_alert_'] = true;
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Usuario No Registrado.";
            $_SESSION['_alert_text'] = "No se ha registrado el Usuario se ha presentado un error con la foto.";
            return null;
		} else {
			$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 16384;

			if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {

				// Archivo temporal
				$imagen_temporal = $_FILES['imagen']['tmp_name'];

				// Tipo de archivo
				$tipo = $_FILES['imagen']['type'];
				// Leemos el contenido del archivo temporal en binario.
				$fp = fopen($imagen_temporal, 'r+b');
				$data = fread($fp, filesize($imagen_temporal));
				fclose($fp);
				return $data;
			}
		}
    }
}