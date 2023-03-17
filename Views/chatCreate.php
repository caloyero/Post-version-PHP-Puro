<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
session_start();
$id = $_SESSION['id_usuario'];
if ($id == null || empty($id)) {
    echo '<h1>NO puede acceder </h1>
   <a href="../Config/cerrarSession.php">Cerrar Secion</a>';

    die();
    header('location:Login.php');
}
?>

<body>
    <section class="chat-container">
        <div class="container-content-chat">
            <div class="container-list-perfil">
                <?php
                include('../Controllers/ChatsController.php');
                include('../Controllers/UsuariosController.php');

                $id_receptor = $_GET['id_receptor'];
                $id_creador = $id;
                $id_usuario = $id_creador;
                $chats = new ChatsController();
                $chat = $chats->showChatsById($id, $id_receptor);
                $usuario_Perfil = new UsuariosController();
                $perfil = $usuario_Perfil->showUsuariosByIdChat($id_creador);
                $perfil_receptor = $usuario_Perfil->showUsuariosByIdChat($id_receptor);
                ?>

                <div class='chat-user-info'>
                    <p><?= $perfil['nombre'] ?></p>
                    <p><?= $perfil['apellido'] ?></p>
                    <img class='chat-user-info-image' src="../ImagenPerfil/<?= $perfil['foto_de_perfil'] ?>" />
                </div>
                <div class='chat-user-info2'>
                    <p><?= $perfil_receptor['nombre'] ?></p>
                    <p><?= $perfil_receptor['apellido'] ?></p>
                    <img class='chat-user-info-image' src="<?= $perfil_receptor['foto_de_perfil'] ?>" />
                </div>

            </div>
            <div class='container-chat'>

                <div class="chat-show-mensajes">
                    <?php
                    for ($i = 0; $i < count($chat); $i++) {
                        if ($id_usuario == $chat[$i]['id_creador']) { ?>
                            <div class="container-mensaje"> 
                                <p style='text-align: center;border-radius: 1em 15em;padding: 1em;width:40%;margin-left: 5%;background-color:white;color:#6C4AB6'><?= $chat[$i]['mensaje'] ?><img class='chat-user-info-image2' src="<?= $perfil['foto_de_perfil'] ?>" /></p>
                            </div>


                        <?php } else { ?>
                            <div class="container-mensaje">
                            <p style='text-align: center;border-radius: 15em 1em;padding: 1em;width:40%; margin-left: 45%;background-color:#CCD5AE;color:#AA77FF'><img class='chat-user-info-image2' src="<?= $perfil_receptor['foto_de_perfil'] ?>" /><?= $chat[$i]['mensaje'] ?></p>
                            </div>
                            
                        <?php  } ?>


                    <?php  }
                    $now = date_create()->format('Y-m-d H:i:s');
                    ?>



                </div>


                <div class="chat-formulario">
                
                    <form action="../Config/actions.php?accion=createChat" method="post">
                        <input type="hidden" type="number" name="id_creador" value="<?= $id_creador ?>" />
                        <input type="hidden" type="number" name="id_receptor" value="<?= $id_receptor ?>" />
                        <input type="hidden" type="number" name="time" value="<?= $now ?>" />
                        <input class="input-mensaje" type="text" name="mensaje" name="mensaje" />
                        <input class="input-submit" type="submit" name="crear" value="Enviar" />
                    </form>
                </div>

            </div>


        </div>
    </section>

</body>

</html>