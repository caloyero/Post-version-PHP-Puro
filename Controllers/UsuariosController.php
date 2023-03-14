<?php
   
   include('../Models/UsuariosModel.php');

   
   class UsuariosController
   {
    var $model ;

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

    public function usuariosAunt($email,$password)
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Procesar datos del formulario
         $email = trim($_POST['email']);
         $password = trim($_POST['password']);
         if(empty($email) or empty($password))
         {
            $this->view('../View/Login.php','error =>los  campos no pueden estar vacios');
         }
         else{
            $resultado = $this->model->getUsuariosAunt($email, $password);
            if( $resultado)
            {
                return $resultado;
            } else{
               
               header('location:../Views/Login.php');
               echo 'el usuari es incorrepto';
               die();
            }
         }
    }
   }

   public function encriptarContraseña($password)
   {
      return password_hash($password,PASSWORD_DEFAULT);
   }

  /*   public function usuariosAunt($email, $password)
   {
       // Comprobar si se ha enviado el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Procesar datos del formulario
      $email = trim($_POST['email']);
      $password = trim($_POST['password']);

      // Validar datos del formulario
      if(empty($email) || empty($password)) {
        $data = ['error' => 'Por favor, introduzca un email y una contraseña válidos.'];
        $this->view('../Views/login', $data);
      } else {
        // Obtener usuario por nombre de usuario
        $user =$this->model->getUsuariosAunt($email, $password);

        // Comprobar si el usuario existe y la contraseña es correcta
        if($user) {
          if(password_verify($password, $user->password)) {
            // Iniciar sesión y redirigir al usuario a la página de inicio
            $_SESSION['user_id'] = $user->id;
            header('location:' . URLROOT);
          } else {
            $data = ['error' => 'La contraseña es incorrecta.'];
            $this->view('../Views/login', $data);
          }
        } else {
          $data = ['error' => 'El usuario no existe.'];
          $this->view('../Views/login', $data);
        }
      }
    } else {
      // Mostrar formulario de inicio de sesión
      $this->view('../Views/login');
    }

   }  */

   }
?>