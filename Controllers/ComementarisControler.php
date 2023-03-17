<?php
   include('../Models/ComentariosModel.php');

   class ComentariosControler
   {
       var $modelo;

       public function __construct()
       {
           $this->modelo =  new ComentariosModelo();
       }

       public function comentar($usuarios_id,$comentario,$post_id)
       {
        $resultado = $this->modelo->createComentario($usuarios_id,$comentario,$post_id);
        return $resultado;
       }
   }
?>