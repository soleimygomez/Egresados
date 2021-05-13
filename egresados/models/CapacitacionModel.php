<?php

class CapacitacionModel
{
	/*************************************
	 *  VARIABLES
	 *************************************/
	private $id;
	private $tema;
	private $fecha;
	private $fecha_fin;
	private $descripcion;
	private $lugar;
	private $encargado;
	private $usuario;
	private $cupo_disponible;
	private $cupo_total;
	private $poster;

	private $db;


	/*******************************************************
	 * CONSTRUCTS
	 *******************************************************/
	/**
	 * Empty builder
	 */
	public function __construct()
	{
		$this->db = new Base;
	}

	/*******************************************************
	 * FUNCTIONS 
	 *******************************************************/
	/*************************************
	 *  FUNCIONES
	 *************************************/
	/**
	 * Función que lista todas capacitaciones.
	 */
	public  function all()
	{
		require_once("UsuarioModel.php");
		$usuario = new UsuarioModel();

		$listaCapacitacion = [];

		$this->db->query("SELECT * FROM capacitaciones  ORDER BY id");

		foreach ($this->db->registers() as $capacitaciones) {

			$capacitacion = new CapacitacionModel();
			$capacitacion->id = $capacitaciones->id;
			$capacitacion->tema = $capacitaciones->tema;
			$capacitacion->fecha = $capacitaciones->fecha_inicio;
			$capacitacion->fecha_fin = $capacitaciones->fecha_fin;
			$capacitacion->lugar = $capacitaciones->lugar;
			$capacitacion->descripcion = $capacitaciones->descripcion;
			$capacitacion->encargado = $capacitaciones->encargado;
			$capacitacion->usuario = $usuario->searchById($capacitaciones->usuario, false);
			$capacitacion->cupo_disponible = $capacitaciones->cupo_disponible;
			$capacitacion->cupo_total = $capacitaciones->cupo_total;
			$capacitacion->poster = $capacitaciones->poster;
			$listaCapacitacion[] = $capacitacion;
		}
		return $listaCapacitacion;
	}

	/**
	 * Función que agrega una nueva capacitación.
	 */
	public function save($capacitacion)
	{

		$this->db->query('INSERT INTO capacitaciones (id,tema,fecha_inicio,fecha_fin,lugar,descripcion,encargado,usuario,cupo_disponible,cupo_total,poster)
		                       VALUES (:id,:tema, :fecha_inicio,:fecha_fin,:lugar,:descripcion, :encargado, :usuario,:cupo_disponible,:cupo_total,:poster)');

		$this->db->bind(":id" , $capacitacion->getId());
		$this->db->bind(":tema" , $capacitacion->getTema());
		$this->db->bind(":fecha_inicio" ,$capacitacion->getFecha());
		$this->db->bind(":fecha_fin" , $capacitacion->getFecha_fin());
		$this->db->bind(":lugar" , $capacitacion->getLugar());
		$this->db->bind(":descripcion", $capacitacion->getDescripcion());
		$this->db->bind(":usuario" , $capacitacion->getUsuario());
		$this->db->bind(":encargado" , $capacitacion->getEncargado());
		$this->db->bind(":cupo_disponible",$capacitacion->getCupoDisponible());
		$this->db->bind(":cupo_total", $capacitacion->getCupoTotal());
		$this->db->bind(":poster" , $capacitacion->getPoster());

		$this->db->execute();

		if ($this->db == true) {
			return true;
		} else {
			return false;
		}
	}


	/**
	 * Function that allows filtering capacitaciones by a date.
	 */
	public function reportsCapacitacion($desde, $hasta)
	{
		$this->db->query("SELECT *
				          FROM capacitaciones 
                          WHERE fecha_inicio BETWEEN :desde AND :hasta");

		$this->db->bind(":desde", $desde);
		$this->db->bind(":hasta", $hasta);

		$capacitaciones = $this->db->registers();
		return $capacitaciones;
	}




	/*******************************************************
	 * GETTER Y SETTERS
	 *******************************************************/
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getTema()
	{
		return $this->tema;
	}

	public function setTema($tema)
	{
		$this->tema = $tema;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	public function getFecha_fin()
	{
		return $this->fecha_fin;
	}

	public function setFecha_fin($fecha_fin)
	{
		$this->fecha_fin = $fecha_fin;
	}

	public function getLugar()
	{
		return $this->lugar;
	}

	public function setLugar($lugar)
	{
		$this->lugar = $lugar;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}
	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function getHora()
	{
		return $this->hora;
	}

	public function setHora($hora)
	{
		$this->hora = $hora;
	}

	public function getEncargado()
	{
		return $this->encargado;
	}

	public function setEncargado($encargado)
	{
		$this->encargado = $encargado;
	}
	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}

	public function getCupoDisponible()
	{

		return $this->cupo_disponible;
	}
	public function getCupoTotal()
	{

		return $this->cupo_total;
	}

	public function getPoster()
	{
		return $this->poster;
	}

	public function setCupoDisponible($cupo_disponible)
	{

		$this->cupo_disponible = $cupo_disponible;
	}
	public function setCupoTotal($cupo_total)
	{

		$this->cupo_total = $cupo_total;
	}

	public function setPoster($poster)
	{
		$this->poster = $poster;
	}
}
