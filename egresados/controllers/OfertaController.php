<?php
class OfertaController
{

	function __construct()
	{
	}

	/**
	 * Función que muestra la view de show.
	 */
	function show()
	{
		$listaOferta = Oferta::all();
		require_once('../../../views/admi/oferta/show.php');
	}

	/**
	 * Función que muestra la view de registrar.
	 */
	function register()
	{
		require_once('../../../views/admi/oferta/register.php');
	}

	/**
	 * Función que guarda una oferta.
	 */
	function save()
	{
		$_SESSION['_alert_'] = true;

		$oferta = new Oferta(
			$_POST['id'],
			$_POST['ciudad'],
			$_POST['descripcion'],
			$_POST['ubicacion'],
			$_POST['empresa'],
			$_POST['cargo'],
			$_POST['vacante'],
			$_SESSION['id_usuario'],
			$_POST['fecha']
		);

		if (Oferta::save($oferta)) {
			$_SESSION['_alert_type'] = 'success';
			$_SESSION['_alert_title'] = "Oferta Empleo Registrada.";
			$_SESSION['_alert_text'] = "Se ha registrado la Oferta Empleo " . strtoupper($oferta->getEmpresa()) . " Cargo: " . strtoupper($oferta->getCargo());
		} else {
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Oferta Empleo No Registrada.";
			$_SESSION['_alert_text'] = "No se ha registrado la Oferta Empleo " . strtoupper($oferta->getEmpresa()) . " Cargo: " . strtoupper($oferta->getCargo());
		}

		echo '<script>
				location.href="ir-registro.php";
	 		</script>';
	}

	function restriction()
	{
		$id = $_GET['id'];
		$oferta = Oferta::searchById($id);
		if (!isset($oferta) || is_null($oferta->getId())) {
			$_SESSION['_alert_'] = true;
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Oferta Empleo No Existe.";
			$_SESSION['_alert_text'] = "La Oferta Empleo ID." . $id . " No se encuentra registrada.";
			echo '<script>
			location.href="ir-lista-ofertas.php";
		 </script>';
		} else {
			require_once('../../../views/admi/oferta/restriction.php');
		}
	}

	function saverestriction()
	{
		require_once('../../../models/RequisitoEmpleo.php');

		if (isset($_POST['id_oferta'])) {
			$oferta_req = new  RequisitoEmpleo();
			$oferta_req->setIdOferta($_POST['id_oferta']);
			$oferta_req->setDescripcion($_POST['descripcion']);

			if (RequisitoEmpleo::save($oferta_req)) {
				$_SESSION['_alert_'] = true;
				$_SESSION['_alert_type'] = 'success';
				$_SESSION['_alert_title'] = "Restricción Oferta Empleo Registrada.";
				$_SESSION['_alert_text'] = "Se ha registrado la registrición Oferta Empleo.";
			} else {
				$_SESSION['_alert_'] = true;
				$_SESSION['_alert_type'] = 'error';
				$_SESSION['_alert_title'] = "Restricción Oferta Empleo No Registrada.";
				$_SESSION['_alert_text'] = "No se ha registrado la registrición Oferta Empleo.";
			}

			$id=$_POST['id_oferta'];
			$url = "?controller=oferta&&action=restriction&&id=$id";
			echo "<script>
           		location.href='$url';
			</script>";
		} else {
			$_SESSION['_alert_'] = true;
			$_SESSION['_alert_type'] = 'error';
			$_SESSION['_alert_title'] = "Oferta Empleo No Registrada.";
			$_SESSION['_alert_text'] = "No se ha encontrado la Oferta Empleo.";

			echo '<script>
				location.href="ir-lista-ofertas.php";
			 </script>';
		}
	}





	/**
	 * Función que actualiza una oferta.
	 */
	function updateshow()
	{
		$id = $_GET['id'];
		$oferta = Oferta::searchById($id);
		require_once('../../../views/admi/oferta/updateshow.php');
	}

	/**
	 * Función que actualiza una oferta empleo.
	 */
	function update()
	{
		if (isset($_POST['id'])) {
			$oferta =  new oferta($_POST['id'], $_POST['ciudad'], $_POST['descripcion'], $_POST['ubicacion'], $_POST['empresa'], $_POST['cargo'], $_POST['vacante'], $_POST['usuario'], $_POST['fecha']);
			Oferta::update($oferta);

			$this->show();
			$_SESSION['success'] = "Se ha actualizado correctamente la oferta empleo.";
		} else {
			$_SESSION['error'] = "No se actualizado la oferta empleo.";
		}

		$id = $_POST['id'];
		$url = "?controller=oferta&&action=updateshow&&id=$id";
		echo "<script>
           location.href='$url';
        </script>";
	}

	/**
	 * Función que elimina una oferta empleo.
	 */
	function delete()
	{
		$id = $_GET['id'];
		$respuesta = Oferta::delete($id);
		$this->show();
		if ($respuesta) {
			$_SESSION['success'] = "Se ha eliminado correctamente la oferta empleo.";
		} else {
			$_SESSION['error'] = "No se ha eliminado la oferta empleo..";
		}
		echo "<script>
           location.href='ir-lista-ofertas.php';
        </script>";
	}
}
