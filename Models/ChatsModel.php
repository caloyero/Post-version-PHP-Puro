<?php
      include_once('../Conexion/conexion.php');

      class ChatsModel
      {
        var $conexion;
        public function __construct()
        {
            $this->conexion  = new conexion();
        }

        public function getChatsById($id,$receptor)
        {
            $consulta = "SELECT * FROM chats  WHERE id_creador= $id and id_receptor = $receptor  OR id_creador= $receptor and id_receptor = $id ORDER BY time";
            $resultado = $this->conexion->getConexion()->query($consulta);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function createChat($id_creador,$id_receptor,$mensaje,$time)
        {
            $consulta = "INSERT INTO chats( id_creador, id_receptor, mensaje, time) VALUES ('$id_creador','$id_receptor','$mensaje','$time')";
            $resultado = $this->conexion->getConexion()->query($consulta);
            return $resultado;
        }

        public function getConverzaciones($id)
        {
            $consulta ="SELECT DISTINCT c.id_creador ,u.nombre,u.apellido,u.foto_de_perfil
            FROM chats c
            LEFT JOIN usuarios u ON u.id = c.id_creador
            WHERE c.id_receptor = $id";
            $resultado = $this->conexion->getConexion()->query($consulta);
            return $resultado;
        }
      }
?>