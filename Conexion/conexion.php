<?php
class Conexion
{
    var $servidor ='localhost';
    public $usuario = 'root';
    public $password = '';
    public $base_de_datos = 'bdpost';
    public $conexion_a_baseDedatos;

    function __construct()
    {
        $this->conexion_a_baseDedatos = new mysqli('localhost','root','','bdpost');
        if($this->conexion_a_baseDedatos->connect_error)
        {
            die("Error connecting to". $this->conexion_a_baseDedatos->connect_error);
        }else{
            /* echo "conexion Activa"; */
        }
    }

    public function getConexion()
    {
        return $this->conexion_a_baseDedatos;
    }
}

?>