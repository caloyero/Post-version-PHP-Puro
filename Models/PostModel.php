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
        $consulta = "SELECT * FROM usuarios us,post ps WHERE us.id = ps.usuarios_id ORDER BY ps.id DESC";
        $unionDeConsulta = $this->conexion->getConexion()->query($consulta);
        $result = $unionDeConsulta->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getPostById($id)
    {
        $consulta = "SELECT ps.id,ps.titulo,ps.contenido,ps.usuarios_id,ps.likes,ps.imagen,us.foto_de_perfil,
        us.nombre FROM usuarios us,post ps WHERE ps.usuarios_id = us.id and us.id = ? ORDER BY ps.id DESC";
        $stmt = $this->conexion->getConexion()->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function createPost($titulo, $contenido, $usuario_id, $likes, $imagen, $notificaciones_id)
    {
        $consulta = "INSERT INTO post(titulo, contenido, usuarios_id, likes, imagen, notificaciones_id) 
        VALUES ('$titulo','$contenido','$usuario_id','$likes','$imagen','$notificaciones_id')";
        $resultado = $this->conexion->getConexion()->query($consulta);
        return $resultado;
    }
}
