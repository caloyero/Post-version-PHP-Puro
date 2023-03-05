<?php
//include('../Models/UsuariosModel.php');
include('../Controllers/UsuariosController.php');
 $usuariosView = new UsuariosController();
 $result=$usuariosView->showAllUsuarios();

 for($i=0;$i<count($result);$i++)
 {
    echo $result[$i]['nombre'] . '<br/>';
 }


?>