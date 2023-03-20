<?php
   include('../Models/ComentariosModel.php');

   class ComentariosController
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

       public function showComentariosById($post_id)
       {
            $resultado = $this->modelo->listComentariosById($post_id);
            return $resultado;
       }

       public function contarComentariosById($post_id)
       {
        $resultado = $this->modelo->countComentarios($post_id);
        return $resultado;
       }
   }
?>