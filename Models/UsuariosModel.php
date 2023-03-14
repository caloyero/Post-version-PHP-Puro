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

    public function getUsuariosForId($id)
    {
        $consulta = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->modelo->getConexion()->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
        
    }

    public function getUsuariosByIdChat($id)
    {
        $consulta = "SELECT nombre,apellido,foto_de_perfil FROM usuarios WHERE id = ?";
        $stmt = $this->modelo->getConexion()->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
        
    }

    public function getUsuariosListByCreateChat()
    {
        $consult ="SELECT id,nombre,apellido,foto_de_perfil FROM usuarios";
        $respuesta = $this->modelo->getConexion()->query($consult);
        return $respuesta ->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsuariosAunt($email, $password)
    {
          $consulta ="SELECT * FROM usuarios WHERE email = '$email' and password = '$password'";
          $respuesta = $this->modelo->getConexion()->query($consulta);
          return $respuesta ->fetch_assoc();
    }
    
   }

   
?>