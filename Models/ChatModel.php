<?php
   include('../Conexion/conexion.php');
    class ChatModel 
    {
        var $conexion;

        function __construct()
        {
            $this->conexion = new Conexion();
        }

        public function getChat()
        {
            $consulta = "SELECT usuarios.nombre,usuarios.foto_de_perfil FROM usuarios WHERE usuarios.id= ?";
            $resultado = $this->conexion->getConexion()->query($consulta);
            return $resultado;
        }
    }

?>