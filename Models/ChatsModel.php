<?php
      include('../Conexion/conexion.php');

      class ChatsModel
      {
        var $conexion;
        public function __construct()
        {
            $this->conexion  = new conexion();
        }

        public function getChatsById($id)
        {
            $consulta = "SELECT * FROM chats  WHERE id_creador= $id OR id_receptor = $id ORDER BY time";
            $resultado = $this->conexion->getConexion()->query($consulta);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function chatCreate($id,$mesaje,$id_creador,$id_receptor,$time)
        {
            $consulta ="INSERT INTO chats VALUES ($id,$mesaje, $id_creador, $id_receptor, $time)";
            $resultado = $this->conexion->getConexion()->query($consulta);
            return $resultado;
        }
      }
?>