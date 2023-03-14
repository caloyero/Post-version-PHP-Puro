<?php
    include('../Models/ChatsModel.php');

    class ChatsController
    {
        var $modelo;

        public function __construct()
        {
            $this->modelo = new ChatsModel();
        }

        public function showChatsById($id,$receptor)
        {
            $result = $this->modelo->getChatsById($id,$receptor);

            return $result;
        }

        public function formCreateChats($id_creador,$id_receptor,$mensaje,$time)
        {
            $result = $this->modelo->createChat($id_creador,$id_receptor,$mensaje,$time);
            return $result;
        }

        public function showConverzaciones($id)
        {
            $result = $this->modelo->getConverzaciones($id);
            return $result;
        }

    }
   
?>