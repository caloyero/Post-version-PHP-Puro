<?php
   class ChatController
   {
      var $modelo;

      function __construct()
      {
        $this->modelo = new ChatModel();
      }

      public function showChat()
      {
         $result = $this->modelo->getChat();
         return $result;
      }
   }
?>