<?php
class Conexion
{
    private $servidor ='localhost';
    private $usuario = 'root';
    private $password = '';
    private $base_de_datos = 'bdpost';
    private $conexion_a_baseDedatos;

    function __construct()
    {
        $this->conexion_a_baseDedatos = new mysqli($this->servidor,$this->usuario,$this->password,$this->base_de_datos);
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