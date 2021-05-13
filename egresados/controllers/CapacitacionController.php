<?php 

class CapacitacionController{


	function __construct()
	{
		
	}
	
    /**
	 * Función que muestra la view de show.
	 */
	function show()
	{
        $capacitacion= new CapacitacionModel();
		$listaCapacitacion = $capacitacion->all();
		require_once('../../../views/admi/capacitacion/show.php');
	}

	/**
	 * Función que muestra la view de registrar.
	 */
	function register()
	{
		require_once('../../../views/admi/capacitacion/register.php');
	}


	/**
	 * Función que guarda una capaitación.
	 */
	function save()
	{
		$_SESSION['_alert_'] = true;
		$capacitacion = new  CapacitacionModel();
		$capacitacion->setId($_POST['id']);
		$capacitacion->setTema($_POST['tema']);
		$capacitacion->setFecha($_POST['fecha']);
		$capacitacion->setFecha_fin($_POST['fecha_fin']);
		$capacitacion->setDescripcion($_POST['descripcion']);
		$capacitacion->setLugar($_POST['lugar']);
		$capacitacion->setEncargado($_POST['encargado']);
		$capacitacion->setUsuario($_SESSION['id_usuario']);
		$capacitacion->setCupoDisponible($_POST['cupo_disponible']);
		$capacitacion->setCupoTotal($_POST['cupo_total']);

			require_once('../../../models/other/Imagen.php');
			$capacitacion->setPoster(Imagen::imagen());
			$capacitacion->setUsuario($_SESSION['id_usuario']);


		if ($capacitacion->save($capacitacion)) {
			$_SESSION['_alert_type'] = 'success';
			$_SESSION['_alert_title'] = "Capacitación Registrada.";
			$_SESSION['_alert_text'] = "Se ha registrado la Capacitación " . strtoupper($capacitacion->getTema());
		} else {
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Capacitación No Registrada.";
			$_SESSION['_alert_text'] = "No se ha registrado la Capacitación" . strtoupper($capacitacion->getTema());
		}

		echo '<script>
           location.href="ir-registro.php";
        </script>';
	}
}

?>