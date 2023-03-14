<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
session_start();
$id = $_SESSION['id_usuario'];
if ($id == null || empty($id)) {

   header('location:Login.php');
    die();
    
}
?>

<body class="App">


    <section>
        <div class="notificaciones">
            <div class="">

                <?php
                include('../Controllers/NotificacionesController.php');

                $consulta = new NotificacionesController();
                $notificaciones = $consulta->showAllNotificaciones();

                for ($i = 0; $i < count($notificaciones); $i++) {
                ?>


                    <div class='container-notificaciones'>
                        <div>
                            <img class='fotoDePerfil-post' src='<?= $notificaciones[$i]['foto_de_perfil'] ?>' />
                            <p class='notificacion-reaccion'>👍</p>
                        </div>

                        <div class='notificacion-text'>
                            <p class='user-text-post'><?= $notificaciones[$i]['nombre'] ?></p>
                            <p class='notificacion-parrafo'>Reacciono a tu post</p>
                        </div>

                    </div>
                <?php    }

                ?>


            </div>
    </section>


</body>

</html>