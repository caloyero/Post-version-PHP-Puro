<?php
    include('../Models/ChatsModel.php');

    class ChatsController
    {
        var $modelo;

        public function __construct()
        {
            $this->modelo = new ChatsModel();
        }

        public function showChatsById($id)
        {
            $result = $this->modelo->getChatsById($id);

            return $result;
        }

        public function formCreateChats($id,$mesaje,$id_creador,$id_receptor,$time)
        {
            $result = $this->modelo->chatCreate($id,$mesaje,$id_creador,$id_receptor,$time);
            return $result;
        }

    }
   
?>