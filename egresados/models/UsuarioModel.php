<?php

class UsuarioModel
{
    /*************************************
     *  VARIABLES
     *************************************/
    private $id;
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $cedula;
    private $foto;
    private $email;
    private $codigo;
    private $direccion;
    private $telefono;
    private $fecha_graduacion;
    private $fecha_actualizacion;
    private $fecha_registro;
    private $clave;
    private $tipo;
    private $actualizado;
    private $fecha_login;

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
     * FUNCTIONS VALIDATIONS
     *******************************************************/
    /**
     * Function that allows to know if a user exists for a code, password and type received.
     */
    public function userExists($codigo, $clave, $tipo_usuario)
    {
        include_once "other/Encriptar.php";
        $encriptada = $encriptar($clave);

        $this->db->query('SELECT * FROM usuarios 
						  WHERE codigo = :codigo AND clave = :clave
                                AND tipo_usuario = :tipo');

        $this->db->bind(':codigo', $codigo);
        $this->db->bind(':clave', $encriptada);
        $this->db->bind(':tipo', $tipo_usuario);

        $usuario = $this->db->register();

        // Number of rows found.
        if ($usuario != null) {
            $this->id = $usuario['id'];
            $this->nombre = $usuario['nombre'];
            $this->tipo = $usuario['tipo_usuario'];
            $this->codigo = $usuario['codigo'];
            $this->actualizado = $usuario['actualizado'];
            $this->fecha_login = $usuario['fecha_login'];

            $this->db = new Base;

            /**
             * DATE LOGIN.
             */
            $this->db->query("UPDATE usuarios SET fecha_login=:fecha_login WHERE id=:id");
            $this->db->bind(":id", $this->getId());
            $this->db->bind(":fecha_login", date("Y-m-d H:i:s"));
            $this->db->execute();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function that allows knowing if a user has already registered.
     *  -1: There is no user.
     *   0: User exists but has not registered.
     *   1: User already registered.
     */
    public function isRegistered($codigo)
    {
        $this->db->query('SELECT clave FROM usuarios 
						  WHERE codigo = :codigo');

        $this->db->bind(':codigo', $codigo);

        $usuario = $this->db->register();

        // Number of rows found.
        if ($usuario != null) {
            $verificar = $usuario['clave'];
            if ($verificar != null || strlen($verificar) > 1) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return -1;
        }
    }

    /**
     * Function that updates a password of a new user.
     */
    public function newPassword($codigo, $clave)
    {
        include_once "other/Encriptar.php";
        $encriptada = $encriptar($clave);

        $this->db->query('UPDATE usuarios 
		                    SET clave = :clave
						  WHERE codigo = :codigo');

        $this->db->bind(':clave', $encriptada);
        $this->db->bind(':codigo', $codigo);

        $this->db->execute();

        if ($this->isRegistered($codigo) == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función que permite recuperar la contraseña.
     */
    public function forgotPassword($email, $codigo)
    {
        $this->db->query('SELECT * FROM usuarios 
						  WHERE codigo = :codigo AND email = :email AND clave != "NULL"');

        $this->db->bind(':codigo', $codigo);
        $this->db->bind(':email', $email);

        $usuario = $this->db->register();

        if ($usuario != null) {

            $this->tipo = $usuario['tipo_usuario'];
            $this->nombre = $usuario['nombre'];
            $this->apellido = $usuario['apellido'];
            $this->cedula = $usuario['cedula'];
            $this->codigo = $usuario['codigo'];
            $this->clave = $usuario['clave'];
            $this->email = $usuario['email'];


            include_once "other/Encriptar.php";
            include_once "other/Email.php";
            $desencriptar = $desencriptar($this->clave);

            $from = "$email";
            $to = "test@gmail.com";
            $subject = "Recuperar Clave $codigo";
            $message = "Su clave es: $desencriptar";
            $headers = "From:" . $from;

            /*if(Email::mail($to, $subject, $message, $headers)){
                return 1;
            }else{
                return 0;
            }*/

            return 1;
        }
        return -1;
    }

    /*******************************************************
     * FUNCTIONS 
     *******************************************************/

     /**
	 * Función que consulta una usuario egresado.
	 */
	public function searchById($id, $estado)
	{
		if($estado){
			$this->db->query('SELECT * FROM usuarios  WHERE id =:id AND tipo_usuario=2');
		}else{
            $this->db->query('SELECT * FROM usuarios  WHERE id =:id');
            $this->db->bind(":id", $id);
		}

		$usuario = $this->db->register();

		$user = new UsuarioModel();
		$user->id = $usuario['id'];
		$user->tipo = $usuario['tipo_usuario'];
		$user->email = $usuario['email'];
		$user->fecha_nacimiento = $usuario['fecha_nacimiento'];
		$user->nombre = $usuario['nombre'];
		$user->apellido = $usuario['apellido'];
		$user->cedula = $usuario['cedula'];
		$user->foto = $usuario['foto_perfil'];
		$user->direccion = $usuario['direccion'];
		$user->telefono = $usuario['telefono'];
		$user->fecha_graduacion = $usuario['fecha_graduacion'];
		$user->codigo = $usuario['codigo'];
		return $user;
    }
    
    /**
     * Function that allows filtering graduates by a date.
     */
    public  function reportsEgresado($desde, $hasta, $tipo)
    {
		$this->db->query("SELECT *
				          FROM usuarios 
                          WHERE tipo_usuario=:tipo_usuario AND fecha_graduacion BETWEEN :desde AND :hasta");
                          
        $this->db->bind(":tipo_usuario", $tipo);
        $this->db->bind(":desde", $desde);
        $this->db->bind(":hasta", $hasta);

        $usuarios= $this->db->registers();
        
		return $usuarios;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getActualizado()
    {
        return $this->actualizado;
    }

    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;
    }

    public function getFechaLogin()
    {
        return $this->fecha_login;
    }

    public function setFechaLogin($fecha_login)
    {
        $this->fecha_login = $fecha_login;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setFechaGraduacion($fecha_graduacion)
    {
        $this->fecha_graduacion = $fecha_graduacion;
    }

    public function getFechaGraduacion()
    {
        return $this->fecha_graduacion;
    }

    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    public function getFechaActualizacion()
    {
        return $this->fecha_actualizacion;
    }
}
