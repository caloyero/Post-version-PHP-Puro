<?php
   include_once('../Conexion/conexion.php');

   class PostModel
   {
    var $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
    }
 
    public function getAllPosts()
    {
        $consulta = "select * from post";
        $unionDeConsulta = $this->conexion->getConexion()->query($consulta);
        $result = $unionDeConsulta->fetch_all(MYSQLI_ASSOC);
        return $result;
 
    }
   }

   
?>