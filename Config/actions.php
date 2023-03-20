<?php
include('../Controllers/UsuariosController.php');
include('../Controllers/ChatsController.php');
include('../Controllers/PostController.php');
include('../Controllers/ComentariosController.php');
$usuarioControl = new UsuariosController();
$chatsController = new ChatsController();
$postController = new PostController();
$comentariosController = new ComentariosController();


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
            $chatsController->formCreateChats($id_creador, $id_receptor, $mensaje, $time);
            header("location:../Views/chatCreate.php?id_receptor=$id_receptor");
            break;

        case 'crearPost':
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                // Obtiene la información del archivo cargado
                $nombre_archivo = $_FILES['imagen']['name'];
                $tipo_archivo = $_FILES['imagen']['type'];
                $tamano_archivo = $_FILES['imagen']['size'];
                $ruta_temporal = $_FILES['imagen']['tmp_name'];
                // Mueve el archivo de la ubicación temporal a una ubicación permanente en el servidor
                $ruta_destino = '../ImagenesPost/' . $nombre_archivo;
                move_uploaded_file($ruta_temporal, $ruta_destino);

                // Mostrar un mensaje de éxito
                echo 'La imagen se ha guardado correctamente.';
            } else {
                // Mostrar un mensaje de error
                echo 'Ha ocurrido un error al cargar la imagen.';
            }

            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $usuarios_id = $_POST['usuarios_id'];
            $likes = $_POST['likes'];
            $imagen = $nombre_archivo;
            $notificaciones_id = $_POST['notificaciones_id'];
            $postController->postearPost($titulo, $contenido, $usuarios_id, $likes, $imagen, $notificaciones_id);
            header('location:../Views/home.php');
            break;

        case 'crearUsuario':
            if (isset($_FILES['foto_de_perfil']) && $_FILES['foto_de_perfil']['error'] === UPLOAD_ERR_OK) {
                $nombre_foto_p = $_FILES['foto_de_perfil']['name'];
                $ruta_foto_p = $_FILES['foto_de_perfil']['tmp_name'];

                $destino_foto_p = '../ImagenPerfil/' . $nombre_foto_p;
                move_uploaded_file($destino_foto_p, $ruta_foto_p);

                $nombre_foto_portada = $_FILES['foto_de_portada']['name'];
                $ruta_foto_portada = $_FILES['foto_de_portada']['tmp_name'];

                $destino_foto_p = '../ImagenPortada/' . $nombre_foto_pportada;
                move_uploaded_file($destino_foto_portada, $ruta_foto_portada);
            }



            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad = $_POST['edad'];
            $foto_de_perfil = $nombre_foto_p;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $foto_de_portada = $nombre_foto_portada;

            $usuarioControl->crearUsuario($nombre, $apellido, $edad, $foto_de_perfil, $email, $password, $foto_de_portada);
            header('location:../Views/Login.php');

        case 'actualizarUsuario':
            /*  if (isset($_FILES['foto_de_perfil'])&& $_FILES['foto_de_perfil']['error']=== UPLOAD_ERR_OK ) {
                    $nombre_foto_p = $_FILES['foto_de_perfil']['name'];
                    $ruta_foto_p = $_FILES['foto_de_perfil']['tmp_name'];
    
                    $destino_foto_p ='../ImagenPerfil/'.$nombre_foto_p;
                    move_uploaded_file($destino_foto_p,$ruta_foto_p);
    
                   
                } 
                if (isset($_FILES['foto_de_portada'])&& $_FILES['foto_de_portada']['error']=== UPLOAD_ERR_OK ) {
                    $nombre_foto_portada = $_FILES['foto_de_portada']['name'];
                    $ruta_foto_portada = $_FILES['foto_de_portada']['tmp_name'];
    
                    $destino_foto_portada ='../ImagenPortada/'.$nombre_foto_portada;
                    move_uploaded_file($destino_foto_portada,$ruta_foto_portada);
                } */


            $id = NULL;
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad = $_POST['edad'];
            $foto_de_perfil = $_FILES["foto_de_perfil"]["name"];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $foto_de_portada = $_FILES["foto_de_portada"]["name"];

           
            // Validar y mover la foto de perfil a la carpeta "ImagenPerfil" en el servidor
           // if (!empty($foto_de_perfil)) {
                $ruta_foto_perfil = "../ImagenPerfil/" . basename($foto_de_perfil);
                if (move_uploaded_file($_FILES["foto_de_perfil"]["tmp_name"], $ruta_foto_perfil)) {
                    // La foto de perfil se ha movido correctamente
                    $foto_de_perfil = $ruta_foto_perfil;
                } else {
                    // Error al mover la foto de perfil
                    $foto_de_perfil = "";
                }
           // }

            $usuarioControl->actualizarUsuario($id, $nombre, $apellido, $edad, $foto_de_perfil, $email, $password, $foto_de_portada);
            //header('location:../Views/perfilOfUserView.php?mensaje=Los datos se han actualizado correctamente.');

        case 'likes':
            $id_post = $_POST['id_post'];
            $likes_old = $_POST['likes'];

            $likes = $likes_old +1;
           
             $postController->sumarLikes($id_post,$likes);
                    header('location:../Views/home.php');
            break;

        case 'crearComentario':
            $id_post = $_POST['id_post'];
            $usuarios_id = $_POST['usuarios_id'];
            $comentario = $_POST['comentario'];

            $comentariosController->comentar($usuarios_id, $comentario, $post_id);
            header('location: ../Views/crearComentarios.php?post_id=' . $post_id);
    }
}
