<?php 
require("config.php");
session_start();

class Base
{

    /*******************************************************
     * VARIABLES
     *******************************************************/
    private $host = HOST;
    private $dbname = DBNAME;
    private $user = USER;
    private $password = PASSWORD;
    private $driver = DRIVER;

    protected $cnx;
    protected $stmt;
    protected $error;
    protected $dbh;
    protected $options;

    /*******************************************************
     * BUILDERS
     *******************************************************/
    public function __construct()
    {
        $this->dbh = $this->driver . ':host=' . $this->host . ';dbname=' . $this->dbname;

        $this->options = [
            PDO::ATTR_ERRMODE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->cnx = new PDO($this->dbh, $this->user, $this->password, $this->options);
            $this->cnx->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /*******************************************************
     * FUCTIONS
     *******************************************************/
    /**
     * Función que recibe la query.
     */
    public function query($query)
    {
        $this->stmt = $this->cnx->prepare($query);
    }

    /**
     * Función que recibe los parametros querry.
     */
    public function bind($params, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        return $this->stmt->bindValue($params, $value, $type);
    }

    /**
     * Función que ejecuta la querry.
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * Función que trae un solo registro.
     */
    public function register()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    /**
     * Función que trae todos los registros.
     */
    public function registers()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Función que muestra cuantos registros obtuvo.
     */
    public function countRows()
    {
        $this->execute();
        return $this->stmt->count();
    }

    /**
     * 
     */
    public function lastValue()
    {
        return $this->stmt->lastInsertId();
    }
}
