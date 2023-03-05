<?php
   include('../Models/PostModel.php');

   class PostController
   {
    var $model;
    
    function __construct()
    {
        $this->model = new PostModel();
    }

    function showAllPosts()
    {
       $result = $this->model->getAllPosts();
       return $result;
    }
    
   }
?>