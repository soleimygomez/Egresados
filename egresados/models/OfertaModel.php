<?PHP class Oferta
{

	/*************************************
	 *  VARIABLES
	 *************************************/
	private $id;
	private $ubicacion;
	private $empresa;
	private $cargo;
	private $vacantes;
	private $usuario;
	private $fecha;
	private $ciudad;
	private $requisitos;

	/*************************************
	 *  CONSTRUCTORES
	 *************************************/
	function __construct($id, $ciudad, $descripcion, $ubicacion, $empresa, $cargo, $vacantes, $usuario, $fecha)
	{
		$this->setId($id);
		$this->setCiudad($ciudad);
		$this->setDescripcion($descripcion);
		$this->setUbicacion($ubicacion);
		$this->setEmpresa($empresa);
		$this->setCargo($cargo);
		$this->setVacantes($vacantes);
		$this->setUsuario($usuario);
		$this->setFecha($fecha);
	}

	/*************************************
	 *  FUNCIONES
	 *************************************/
	/**
	 * Función que lista todas ofertas empleo.
	 */
	public static function all()
	{

		include_once('RequisitoEmpleo.php');

		$db = Db::getConnect();
		$listaoferta = [];

		$id = $_SESSION['id_usuario'];
		$select = $db->query("SELECT * FROM ofertas_empleo WHERE usuario=$id ORDER BY id");

		foreach ($select->fetchAll() as $oferta) {
			$oferta = new Oferta($oferta['id'], $oferta['ciudad'], $oferta['descripcion'], $oferta['ubicacion'], $oferta['empresa'], $oferta['cargo'], $oferta['vacantes'], $oferta['usuario'], $oferta['fecha']);
			$oferta->setRequisitos(RequisitoEmpleo::all($oferta->getId()));
			$listaoferta[] = $oferta;
		}
		return $listaoferta;
	}

	/**
	 * Función que agrega una nueva oferta empleo.
	 */
	public static function save($oferta)
	{
		$db = Db::getConnect();

		$insert = $db->prepare('INSERT INTO ofertas_empleo (id,ubicacion,descripcion,empresa,cargo,vacantes,usuario,fecha,ciudad)
							  VALUES (:id,:ubicacion, :descripcion,:empresa,:cargo,:vacantes, :usuario, :fecha, :ciudad)');

		$insert->execute(array(
			":id" => $oferta->getId(),
			":ciudad" => $oferta->getCiudad(),
			":descripcion" => $oferta->getDescripcion(),
			":ubicacion" => $oferta->getUbicacion(),
			":empresa" => $oferta->getEmpresa(),
			":cargo" => $oferta->getCargo(),
			":vacantes" => $oferta->getVacantes(),
			":usuario" => $_SESSION['id_usuario'],
			":fecha" => $oferta->getFecha()
		));

		if ($insert == true) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Función que consulta una oferta empleo.
	 */
	public static function searchById($id)
	{
		$db = Db::getConnect();
		$select = $db->prepare('SELECT * FROM ofertas_empleo WHERE id=:id AND usuario=:usuario');
		$select->bindValue('id', $id);
		$select->bindValue('usuario', $_SESSION['id_usuario']);
		$select->execute();

		$ofertaDb = $select->fetch();


		$oferta = new Oferta(
			$ofertaDb['id'],
			$ofertaDb['ciudad'],
			$ofertaDb['descripcion'],
			$ofertaDb['ubicacion'],
			$ofertaDb['empresa'],
			$ofertaDb['cargo'],
			$ofertaDb['vacantes'],
			$ofertaDb['usuario'],
			$ofertaDb['fecha']
		);

		return $oferta;
	}

	/**
	 * Función que actualiza una oferta empleo.
	 */
	public static function update($oferta)
	{
		$db = Db::getConnect();
		$update = $db->prepare('UPDATE ofertas_empleo SET ciudad=:ciudad,  descripcion=:descripcion , ubicacion=:ubicacion,empresa=:empresa, cargo=:cargo ,vacantes=:vacantes, fecha=:fecha 
		                      WHERE id=:id AND usuario=:usuario');
		$update->bindValue('id', $oferta->getId());
		$update->bindValue('ciudad', $oferta->getCiudad());
		$update->bindValue('descripcion', $oferta->getDescripcion());
		$update->bindValue('ubicacion', $oferta->getUbicacion());
		$update->bindValue('empresa', $oferta->getEmpresa());
		$update->bindValue('cargo', $oferta->getCargo());
		$update->bindValue('vacantes', $oferta->getVacantes());
		$update->bindValue('usuario', $_SESSION['id_usuario']);
		$update->bindValue('fecha', $oferta->getFecha());
		$update->execute();
	}

	/**
	 * Función que elimina una oferta empleo.
	 */
	public static function delete($id)
	{
		$db = Db::getConnect();
		$delete = $db->prepare('DELETE  FROM ofertas_empleo WHERE id=:id AND usuario=:usuario');
		$delete->bindValue('id', $id);
		$delete->bindValue('usuario', $_SESSION['id_usuario']);
		$delete->execute();
		return true;
	}

	/**
	 * Función que permite filtrar por una fecha las ofertas.
	 */
    public  function reportsOferta($desde, $hasta)
    {
		$this->db->query("SELECT *
				          FROM ofertas_empleos 
                          WHERE  AND fecha BETWEEN :desde AND :hasta");
                          
        $this->db->bind(":desde", $desde);
        $this->db->bind(":hasta", $hasta);

        $usuarios= $this->db->registers();
        
		return $usuarios;
    }

	/*************************************
	 *  GETTER Y SETTERS
	 *************************************/
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}


	public function getCiudad()
	{
		return $this->ciudad;
	}

	public function setCiudad($ciudad)
	{
		$this->ciudad = $ciudad;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function getRequisitos()
	{
		return $this->requisitos;
	}

	public function setRequisitos($requisitos)
	{
		$this->requisitos = $requisitos;
	}


	public function getUbicacion()
	{
		return $this->ubicacion;
	}

	public function setUbicacion($ubicacion)
	{
		$this->ubicacion = $ubicacion;
	}

	public function getEmpresa()
	{
		return $this->empresa;
	}

	public function setEmpresa($empresa)
	{
		$this->empresa = $empresa;
	}

	public function getCargo()
	{
		return $this->cargo;
	}

	public function setCargo($cargo)
	{
		$this->cargo = $cargo;
	}

	public function getVacantes()
	{
		return $this->vacantes;
	}

	public function setVacantes($vacantes)
	{
		$this->vacantes = $vacantes;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}
	public function setUsuario($usuario)
	{
		return $this->usuario = $usuario;
	}

	public function getFecha()
	{
		return $this->fecha;
	}
	public function setFecha($fecha)
	{
		return $this->fecha = $fecha;
	}
}
