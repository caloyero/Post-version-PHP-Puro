<?php

include_once('../Conexion/conexion.php');

class ComentariosModelo
{
    var $conexion;

    public function __construct()
    {
        $this->conexion = new conexion();
    }

    public function createComentario($usuarios_id,$comentario,$post_id)
    {
        $consulta = "INSERT INTO comentarios(id, usuarios_id, comentario, post_id) 
        VALUES (NULL,'$usuarios_id','$comentario','$post_id')";

        $resultado = $this->conexion->getConexion()->query($consulta);
        return $resultado;
    }

    public function listComentariosById($post_id)
    {
        $consulta ="SELECT P.id,C.comentario,U.nombre,U.foto_de_perfil FROM post P
        LEFT JOIN comentarios C ON P.id = C.post_id
        LEFT JOIN usuarios U ON C.usuarios_id = U.id
        WHERE P.id = $post_id ";

        $result = $this->conexion->getConexion()->query($consulta);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /* public function countComentarios($post_id)
    {
        $consulta ="SELECT COUNT(comentarios.comentario)FROM comentarios WHERE comentarios.post_id = $post_id";
        $resultado = $this->conexion->getConexion()->query($consulta);
        return $resultado;
    } */

    public function countComentarios($post_id)
{
    // Prepare the query using a prepared statement
    $consulta = "SELECT COUNT(comentarios.comentario) FROM comentarios WHERE comentarios.post_id = ?";
    $stmt = $this->conexion->getConexion()->prepare($consulta);
    
    // Bind the post ID to the prepared statement
    $stmt->bind_param("i", $post_id);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result
    $resultado = $stmt->get_result();
    
    // Check for errors
    if ($resultado === false) {
        // Handle the error appropriately (e.g. log it, return an error message)
        return false;
    }
    
    // Fetch the count from the result and return it
    $count = $resultado->fetch_array()[0];
    return $count;
}

}
?>