<?php

include_once('../Conexion/conexion.php');

class ComentariosModelo
{
    var $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function createComentario($usuarios_id,$comentario,$post_id)
    {
        $consulta = "INSERT INTO comentarios(NULL, usuarios_id, comentario, post_id) 
        VALUES ('($usuarios_id','$comentario','$post_id'";

        $resultado = $this->conexion->getConexion()->query($consulta);
        return $resultado;
    }
}
?>