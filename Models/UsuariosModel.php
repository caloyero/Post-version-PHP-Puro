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

    public function createUser($nombre,$apellido,$edad,$foto_de_perfil,$email,$password,$foto_de_portada)
    {
        $consulta = "INSERT INTO usuarios(id, nombre, apellido, edad, foto_de_perfil, email, password, foto_de_portada) 
        VALUES ('NULL','$nombre','$apellido','$edad','$foto_de_perfil','$email','$password','$foto_de_portada')";
        $respuesta = $this->modelo->getConexion()->query($consulta);
        return $respuesta;
    }
/* 
    public function updateUsuario($id,$nombre,$apellido,$edad,$foto_de_perfil,$email,$password,$foto_de_portada)
    {
        $consulta = "UPDATE usuarios SET nombre='$nombre',apellido='$apellido',
        edad='$edad',foto_de_perfil='$foto_de_perfil',email='$email',password='$password',foto_de_portada='$foto_de_portada' WHERE id = $id";
         $respuesta = $this->modelo->getConexion()->query($consulta);
         return $respuesta;
    } */

    public function updateUsuario($id, $nombre, $apellido, $edad, $foto_de_perfil, $email, $password, $foto_de_portada)
{
  // Validar y sanear los datos ingresados por el usuario
  $id = intval($id);
  $nombre = mysqli_real_escape_string($this->modelo->getConexion(), $nombre);
  $apellido = mysqli_real_escape_string($this->modelo->getConexion(), $apellido);
  $edad = intval($edad);
  $foto_de_perfil = mysqli_real_escape_string($this->modelo->getConexion(), $foto_de_perfil);
  $email = mysqli_real_escape_string($this->modelo->getConexion(), $email);
  $password = mysqli_real_escape_string($this->modelo->getConexion(), $password);
  $foto_de_portada = mysqli_real_escape_string($this->modelo->getConexion(), $foto_de_portada);

  // Verificar que los datos ingresados cumplan con las restricciones y reglas de validación definidas para cada campo en la base de datos

  // Utilizar consultas preparadas
  $consulta = "UPDATE usuarios SET nombre=?, apellido=?, edad=?, foto_de_perfil=?, email=?, password=?, foto_de_portada=? WHERE id=?";
  $stmt = $this->modelo->getConexion()->prepare($consulta);
  $stmt->bind_param("ssissssi", $nombre, $apellido, $edad, $foto_de_perfil, $email, $password, $foto_de_portada, $id);
  $respuesta = $stmt->execute();

  // Manejar adecuadamente los errores que puedan ocurrir durante la ejecución de la consulta SQL
  if (!$respuesta) {
    throw new Exception("Error al actualizar el usuario: " . $this->modelo->getConexion()->error);
  }

  return $respuesta;
}

    
   }
   
?>