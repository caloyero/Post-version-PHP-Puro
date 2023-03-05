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
   }
?>