<?php
   include_once('../Conexion/conexion.php');

   class UsuariosModel
   {
    var $modelo;// con esta variable gcrearemos una instancia de la  clase conexion

    function __construct()
    {
        $this->modelo = new Conexion();//creacion del objeto conexion
    }
    public function getAllUsuarios()
    {
        //$conexion = $modelo->getAllUsuarios();
        $consulta = "select * from usuarios";
        $respuesta = $this->modelo->getConexion()->query($consulta);
        return $respuesta->fetch_all(MYSQLI_ASSOC);// el metodo fetch_all() se utiiza para una consulta que va a devolver mas de un registro
    }
   }

?>