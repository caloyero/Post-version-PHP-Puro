<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
?>

<body>
    <section class="chat-container">
        <div class="container-content-chat">
            <div class="container-list-perfil">
                <?php
                include('../Controllers/ChatsController.php');
                include('../Controllers/UsuariosController.php');

                $id_receptor = $_GET['id_receptor'];
                $id_creador = $_GET['id'];
                $id = $id_receptor;
                $id_usuario = $id_receptor;
                $chats = new ChatsController();
                $chat = $chats->showChatsById($id);
                $usuario_Perfil = new UsuariosController();
                $perfil = $usuario_Perfil->showUsuariosByIdChat($id)
                /*  $chatCreate = $chats->formCreateChats($id,$mesaje,$id_creador,$id_receptor,$time); */
                ?>

                <div class='chat-user-info'>
                    <p><?= $perfil['nombre'] ?></p>
                    <p><?= $perfil['apellido'] ?></p>
                    <img class='chat-user-info-image' src="<?= $perfil['foto_de_perfil'] ?>" />
                </div>

            </div>
            <div class='container-chat'>

                <div class="chat-show-mensajes">
                    <h1>aqui va el texto</h1>
                    <?php
                    for ($i = 0; $i < count($chat); $i++) {
                        if ($id_usuario == $chat[$i]['id_creador']) { ?>


                            <p style='text-align: center;border-radius: 1em 15em;padding: 1em;max-width:40%;margin-left: 5%;background-color:white;color:#6C4AB6'>".$chat[$i]['mensaje']."</p>"
                        <?php } else { ?>

                            <p style='text-align: center;border-radius: 15em 1em;padding: 1em;width:40%; margin-left: 45%;background-color:#8b9dc3;color:#f7f7f7'>".$chat[$i]['mensaje']."</p>";
                        <?php  } ?>


                    <?php  }
                    ?>



                </div>


                <div class="chat-formulario">
                    <form action="" method="post">
                        <input type="hidden" type="number" name="id_creador" value="<?= $id_creador ?>" />
                        <input type="hidden" type="number" name="id_recetor" value="<?= $id_creador ?>" />
                        <input class="input-mensaje" type="text" name="mensaje" name="mensaje" />
                        <input class="input-submit" type="submit" name="crear" value="Enviar" />
                    </form>
                </div>

            </div>


        </div>
    </section>

</body>

</html>