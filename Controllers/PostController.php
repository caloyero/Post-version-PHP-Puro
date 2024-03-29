<?php
   include('../Models/PostModel.php');

   class PostController
   {
    var $model;
    
    function __construct()
    {
        $this->model = new PostModel();
    }

    public function showAllPosts()
    {
       $result = $this->model->getAllPosts();
       return $result;
    }

    public function showAllPostsById($id)
    {
        $result = $this->model->getPostById($id);
        return $result;
    }

    public function postearPost($titulo, $contenido, $usuario_id, $likes, $imagen, $notificaciones_id)
    {
        $result = $this->model->createPost($titulo, $contenido, $usuario_id, $likes, $imagen, $notificaciones_id);
        return $result;
    }

    public function showLikes($id_post)
    {
        $result = $this->model->listLikes($id_post);
        return $result;
    }

    public function sumarLikes($id_post,$likes)
    {
        
        $result = $this->model->darLikes($id_post,$likes);
        return $result;
    }
    
   }
?>