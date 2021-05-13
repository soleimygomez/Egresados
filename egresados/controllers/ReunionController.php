<?php

class ReunionController
{

	function __construct()
	{
	}

	/**
	 * Función que muestra la view de show.
	 */
	function show()
	{
		$listaReunion = Reunion::all();
		require_once('../../../views/admi/reunion/show.php');
	}

	/**
	 * Función que muestra la view de registrar.
	 */
	function register()
	{
		require_once('../../../views/admi/reunion/register.php');
	}

	/**
	 * Función que guarda una reunion.
	 */
	function save()
	{
		
		$reunion = new  Reunion();
		require_once('../../../models/Imagen.php');
		$reunion->setPoster(Imagen::imagen());

		$_SESSION['_alert_'] = true;
		$reunion->setId($_POST['id']);
		$reunion->setFecha($_POST['fecha']);
		$reunion->setDescripcion($_POST['descripcion']);
		$reunion->setLugar($_POST['lugar']);
		$reunion->setUsuario($_POST['usuario']);
		$reunion->setTema($_POST['tema']);
	   
	    $reunion->setCupoDisponible($_POST['cupo_disponible']);
		$reunion->setCupo($_POST['cupo']);

		if (Reunion::save($reunion)) {
			$_SESSION['_alert_type'] = 'success';
			$_SESSION['_alert_title'] = "Reunión Registrada.";
			$_SESSION['_alert_text'] = "Se ha registrado la Reunión.";
		} else {
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Reunión No Registrada.";
			$_SESSION['_alert_text'] = "No se ha registrado la Reunión.";
		}

		echo '<script>
           location.href="ir-registro.php";
        </script>';
	}

	/**
	 * Función que actualiza una reunion.
	 */
	function updateshow()
	{
		$id = $_GET['id'];
		$reunion = Reunion::searchById($id);
		if (!isset($reunion) || is_null($reunion->getId())) {

			$_SESSION['_alert_'] = true;
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Reunión No Existe.";
			$_SESSION['_alert_text'] = "La Reunión ID." . $id . " No se encuentra registrada.";
			echo '<script>
			location.href="ir-lista-reunion.php";
		 </script>';
		} else {
			require_once('../../../views/admi/reunion/updateshow.php');
		}
	}

	/**
	 * Función que actualiza una capacitación.
	 */
	function update()
	{
		if (isset($_POST['id'])) {

			$reunion = new  Reunion();
			$reunion->setId($_POST['id']);
			$reunion->setFecha($_POST['fecha']);
			$reunion->setDescripcion($_POST['descripcion']);
			$reunion->setLugar($_POST['lugar']);
			$reunion->setUsuario($_POST['usuario']);
			$reunion->setTema($_POST['tema']);
			
			$reunion->setCupoDisponible($_POST['cupo_disponible']);
			$reunion->setCupo($_POST['cupo']);

			require_once('../../../models/Imagen.php');
			$reunion->setPoster(Imagen::imagen());

			Reunion::update($reunion);
			$this->show();

			$id = $_POST['id'];
			$url = "?controller=reunion&&action=updateshow&&id=$id";
			echo "<script>
           location.href='$url';
        </script>";

			$_SESSION['_alert_'] = true;
			$_SESSION['_alert_type'] = 'success';
			$_SESSION['_alert_title'] = "Reunión Actualizada";
			$_SESSION['_alert_text'] = "Se ha actualizado la Reunión.";
		} else {
			$_SESSION['_alert_'] = true;
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Reunión No Actualizada.";
			$_SESSION['_alert_text'] = "No se ha actualizado la Reunión.";

			echo "<script>
           		location.href='ir-lista-reunion.php';
    		</script>";
		}		
	}

	/**
	 * Función que elimina un usuario.
	 */
	function delete()
	{
		$id = $_GET['id'];
		$respuesta = Reunion::delete($id);
		$this->show();

		$_SESSION['_alert_'] = true;
		if ($respuesta) {
			$_SESSION['_alert_type'] = 'success';
			$_SESSION['_alert_title'] = "Reunión Eliminada";
			$_SESSION['_alert_text'] = "Se ha eliminado la Reunión ID." . $id;
		} else {
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Reunión No Eliminada";
			$_SESSION['_alert_text'] = "No se ha eliminado la Reunión ID." . $id;
		}

		echo "<script>
           location.href='ir-lista-reunion.php';
        </script>";
	}
	function newFoto()
	{
		require_once('../../models/Imagen.php');


		$image = Imagen::imagen();
		$_SESSION['_alert_'] = true;

		if (!is_null($image)) {
			if (Usuario::newPhoto($image)) {
				$_SESSION['_alert_type'] = 'success';
				$_SESSION['_alert_title'] = "Usuario Actualizado.";
				$_SESSION['_alert_text'] = "Se ha actualizado tu foto de perfil.";
			} else {
				$_SESSION['_alert_type'] = 'error';
				$_SESSION['_alert_title'] = "Usuario No Actualizado.";
				$_SESSION['_alert_text'] = "No se ha actualizado tu foto de perfil.";
			}
		}
		echo "<script>
           location.href='../../views/admi/perfil.php';
        </script>";
	}
}
