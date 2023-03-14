<?php
include('../Controllers/UsuariosController.php');
include('../Controllers/ChatsController.php');
include('../Controllers/PostController.php');
$usuarioControl = new UsuariosController();
$chatsController = new ChatsController();
$postController = new PostController();


extract($_REQUEST);
if (isset($accion)) {
    switch ($accion) {
        case 'autenticar':
            $email = $_POST['email'];
            $password = $_POST['password'];
            $aunt = $usuarioControl->usuariosAunt($email, $password);
            session_start();
            $_SESSION['id_usuario'] = $aunt['id'];
            header("location:../Views/home.php");
            break;

        case 'createChat':
              $id_creador = $_POST['id_creador'];
              $id_receptor = $_POST['id_receptor'];  
              $mensaje = $_POST['mensaje'];  
              $time = $_POST['time'];
              $chatsController->formCreateChats($id_creador,$id_receptor,$mensaje,$time);
              header("location:../Views/chatCreate.php?id_receptor=$id_receptor");
              break;

        case 'crearPost':
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) 
            {
                // Obtiene la información del archivo cargado
                $nombre_archivo = $_FILES['imagen']['name'];
                $tipo_archivo = $_FILES['imagen']['type'];
                $tamano_archivo = $_FILES['imagen']['size'];
                $ruta_temporal = $_FILES['imagen']['tmp_name'];
                 // Mueve el archivo de la ubicación temporal a una ubicación permanente en el servidor
                $ruta_destino = './ImagenesPost/' . $nombre_archivo;
                $imagen = move_uploaded_file($ruta_temporal, $ruta_destino);

                // Mostrar un mensaje de éxito
                echo 'La imagen se ha guardado correctamente.';
               }else {
               // Mostrar un mensaje de error
                echo 'Ha ocurrido un error al cargar la imagen.';
               }
             
            $titulo =$_POST['titulo'];
            $contenido =$_POST['contenido'];
            $usuarios_id =$_POST['usuarios_id'];
            $likes =$_POST['likes'];
            //$imagen =$contenidoM;
            $notificaciones_id =$_POST['notificaciones_id'];  
            $postController->postearPost($titulo, $contenido, $usuarios_id, $likes, $imagen, $notificaciones_id); 
            header('location:../Views/home.php');
            break; 
    }
}
?>