<?php
 class Reunion{

	/*************************************
	 *  VARIABLES
	 *************************************/
	private $id;
    private $fecha;
    private $descripcion;
    private $lugar;
	private $usuario;
    private $tema;
	private $cupo_disponible;
	private $cupo;
	private $poster;

    /*************************************
	 *  CONSTRUCTORES
	 *************************************/
	function __construct()
	{
    }

    /*************************************
	 *  FUNCIONES
	 *************************************/
	/**
	 * Función que lista todas capacitaciones.
	 */
    public static function all(){
		$db=Db::getConnect();
		$listaReunion=[];
 
        $id= $_SESSION['id_usuario'];
        $select=$db->query("SELECT * FROM reuniones WHERE usuario=$id ORDER BY id");
 
		foreach($select->fetchAll() as $reunion){
			$aux= new Reunion();
			$aux->setId($reunion['id']);
			$aux->setLugar($reunion['lugar']);
			$aux->setDescripcion($reunion['descripcion']);
			$aux->setFecha($reunion['fecha']);
			$aux->setUsuario($reunion['usuario']);
			$aux->setTema($reunion['tema']);
			$aux->setCupoDisponible( $reunion['cupo_disponible']);
			$aux->setCupo($reunion['cupo']);
			$aux->setPoster($reunion['poster']);

			$listaReunion[]= $aux;
		}
		
		return $listaReunion;
    }

    /**
	 * Función que agrega una nueva reunion.
	 */
	public static function save($reunion)
	{
		$db = Db::getConnect();

		$insert = $db->prepare('INSERT INTO reuniones (id,fecha,descripcion,lugar,usuario,tema,poster,cupo_disponible,cupo)
		                       VALUES (:id,:fecha, :descripcion,:lugar,:usuario,:tema,:poster,:cupo_disponible,:cupo)');

		$insert->execute(array(
			":id" => $reunion->getId(),
			":fecha" => $reunion->getFecha(),
			":descripcion" => $reunion->getDescripcion(),
			":lugar" => $reunion->getLugar(),
			":usuario" => $_SESSION['id_usuario'],
			":tema" => $reunion->getTema(),
			"poster" => $reunion->getPoster(),
			"cupo_disponible" => $reunion->getCupoDisponible(),
			"cupo" => $reunion->getCupo()
			
			
			
			
		));

		if ($insert == true) {
			return true;
		} else {
			return false;
		}
    }
    
    /**
	 * Función que consulta una reunion.
	 */
	public static function searchById($id)
	{
		$db = Db::getConnect();
		$select = $db->prepare('SELECT * FROM reuniones WHERE id=:id');
		$select->bindValue('id', $id);
		$select->execute();

		$reuniones = $select->fetch();

		$reunion = new Reunion();
		$reunion->id = $reuniones['id'];
		$reunion->fecha = $reuniones['fecha'];
		$reunion->descripcion = $reuniones['descripcion'];
		$reunion->lugar = $reuniones['lugar'];
		$reunion->usuario = $reuniones['usuario'];
		$reunion->tema = $reuniones['tema'];
		$reunion->poster = $reuniones['poster'];
		$reunion->cupo_disponible = $reuniones['cupo_disponible'];
		$reunion->cupo = $reuniones['cupo'];
		return $reunion;
    }

    /**
	 * Función que actualiza una reunión.
	 */
	public static function update($reunion)
	{
		$db = Db::getConnect();

		$update = $db->prepare('UPDATE reuniones SET fecha=:fecha,lugar=:lugar,descripcion=:descripcion,
		tema=:tema, poster=:poster,cupo_disponible=:cupo_disponible,cupo=:cupo
                                    WHERE id=:id AND usuario=:usuario');

		$update->bindValue('fecha', $reunion->getFecha());
		$update->bindValue('lugar', $reunion->getLugar());
        $update->bindValue('descripcion', $reunion->getDescripcion());
		$update->bindValue('tema', $reunion->getTema());
		$update->bindValue('poster', $reunion->getPoster());
		$update->bindValue('cupo_disponible', $reunion->getCupoDisponible());
		$update->bindValue('cupo', $reunion->getCupo());
		
        $update->bindValue('id', $reunion->getId());
		
		
        $update->bindValue('usuario', $_SESSION['id_usuario']);

		$update->execute();
	}
	
	/**
	 * Función que elimina una reunón.
	 */
	public static function delete($id)
	{
		$db = Db::getConnect();
		$delete = $db->prepare('DELETE  FROM reuniones WHERE id=:id');
		$delete->bindValue('id', $id);
		$delete->execute();

		return true;
	}

	/**
	 * Función que permite filtrar por una fecha las reuniones.
	 */
    public function reportsReunion($desde, $hasta)
    {
        $this->db->query("SELECT *
				          FROM reuniones 
                          WHERE fecha BETWEEN :desde AND :hasta");

        $this->db->bind(":desde", $desde);
        $this->db->bind(":hasta", $hasta);

        $reuniones= $this->db->registers();
		return $reuniones;
    }
/*************************************
	 *  GETTER Y SETTERS
	 *************************************/
    public function getId(){
		return $this->id;
	}
 
	public function setId($id){
		$this->id = $id;
	}
	

	public function setEncargado($encargado){
		$this->encargado = $encargado;
	}
	public function getEncargado(){
		return $this->encargado;
	}
 
	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
    
    public function getDescripcion(){
		return $this->descripcion;
	}
 
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
    public function getLugar(){
		return $this->lugar;
	}
 
	public function setLugar($lugar){
		$this->lugar= $lugar;
	}

	public function getUsuario(){
		return $this->usuario;
	}
 
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getTema(){
		return $this->tema;
	}
 
	public function setTema($tema){
		$this->tema = $tema;
	}
	
	public function getCupoDisponible(){
		return $this->cupo_disponible;
	}
 
	public function setCupoDisponible($cupo_disponible){
		$this->cupo_disponible = $cupo_disponible;
	}
	
	
	public function getCupo(){
		return $this->cupo;
	}
 
	public function setCupo($cupo){
		$this->cupo = $cupo;
	}
	
	public function getPoster(){
		return $this->poster;
	}
	public function setPoster($poster){
		 $this->poster=$poster;
	}
}