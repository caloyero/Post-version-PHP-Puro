<?php
include('../Models/NotificacionesModel.php');

class NotificacionesController 
{
    var $modelo;

    function __construct()
    {
        $this->modelo = new NotificacionesModel();
    }

    public function showAllNotificaciones()
    {
        $result = $this->modelo->getAllNotificaciones();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>