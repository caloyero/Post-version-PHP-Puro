<?php

include('../Models/UsuariosModel.php');


class UsuariosController
{
   var $model;

   function __construct()
   {
      $this->model = new UsuariosModel();
   }

   public function showAllUsuarios()
   {
      $result = $this->model->getAllUsuarios();

      return $result;
   }

   public function showUsuariosForId($id)
   {
      $result = $this->model->getUsuariosForId($id);
      return $result;
   }

   public function showUsuariosByIdChat($id)
   {
      $result = $this->model->getUsuariosByIdChat($id);
      return $result;
   }

   public function showUsuariosListByCreateChat()
   {
      $respuesta = $this->model->getUsuariosListByCreateChat();
      return $respuesta;
   }

   public function view($ruta, $data = [])
   {
      extract($data);
      include($ruta);
   }

   public function usuariosAunt($email, $password)
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Procesar datos del formulario
         $email = trim($_POST['email']);
         $password = trim($_POST['password']);
         if (empty($email) or empty($password)) {
            $this->view('../View/Login.php', 'error =>los  campos no pueden estar vacios');
         } else {
            $resultado = $this->model->getUsuariosAunt($email, $password);
            if ($resultado) {
               return $resultado;
            } else {

               header('location:../Views/Login.php');
               echo 'el usuari es incorrepto';
               die();
            }
         }
      }
   }

   public function encriptarContraseña($password)
   {
      return password_hash($password, PASSWORD_DEFAULT);
   }

   public function crearUsuario($nombre, $apellido, $edad, $foto_de_perfil, $email, $password, $foto_de_portada)
   {
      $result = $this->model->createUser($nombre, $apellido, $edad, $foto_de_perfil, $email, $password, $foto_de_portada);
      return $result;
   }

   public function actualizarUsuario($id, $nombre, $apellido, $edad, $foto_de_perfil, $email, $password, $foto_de_portada)
   {
      $result = $this->model->updateUsuario($id,$nombre,$apellido,$edad,$foto_de_perfil,$email,$password,$foto_de_portada);
      return $result;
   }
}
