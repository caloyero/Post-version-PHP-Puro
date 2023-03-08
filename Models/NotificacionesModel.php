<?php
include('../Conexion/conexion.php');

class NotificacionesModel 
{
    var $conexion ;

    function __construct( )
    {
        $this->conexion = new Conexion();
    }

    public function getAllNotificaciones()
    {
        $consulta = "SELECT N.tipo,U.nombre,U.apellido,U.foto_de_perfil FROM notificaciones N LEFT JOIN usuarios U ON N.id_usuario = U.id LEFT JOIN post P ON N.id_post = P.id WHERE P.usuarios_id = 1";
        $resultado = $this->conexion->getConexion()->query($consulta);
        return $resultado;
    }
}

?>