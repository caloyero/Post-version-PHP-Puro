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

<body>
    <section class="chat-container">
        <div class="container-content-chat">
            <div class="container-list-perfil">
                <?php
                include('../Controllers/ChatsController.php');
                include('../Controllers/UsuariosController.php');

                $usuario_Perfil = new UsuariosController();
                $usuario_converzaciones = new ChatsController();
                $perfil = $usuario_Perfil->showUsuariosByIdChat($id);
                $converzaciones = $usuario_converzaciones->showConverzaciones($id);

                
                ?>
                <div class='chat-user-info'>
                    <p><?= $perfil['nombre'] ?></p>
                    <p><?= $perfil['apellido'] ?></p>
                    <img class='chat-user-info-image' src="../ImagenPerfil/<?= $perfil['foto_de_perfil'] ?>" />
                </div>

                <?php foreach($converzaciones as $result) {
                     ?>
                    <div class="chat-user-info2">
                        <!-- <a href="./chatCreate.php?id_receptor=<?= $result['id'] ?>"> -->
                            <img class="chat-user-info-image" src="<?= $result['foto_de_perfil'] ?>" />
                            <p><?= $result["nombre"] ?></p>
                            <p><?= $result["apellido"] ?></p>
                       <!--  </a> -->
                    </div>
                <?php } ?>

            </div>
            <div class='container-chat'>
                <?php
                 for ($i = 0; $i < count($chat); $i++) {
                    if ($id_usuario == $chat[$i]['id_creador']) {
                        echo "
                   
                    <p style='text-align: center;border-radius: 1em 15em;padding: 1em;max-width:40%;margin-left: 5%;background-color:white;color:#6C4AB6'>" . $chat[$i]['mensaje'] . "</p>";
                    } else {
                        echo "
                    <p style='text-align: center;border-radius: 15em 1em;padding: 1em;width:40%; margin-left: 45%;background-color:#8b9dc3;color:#f7f7f7'>" . $chat[$i]['mensaje'] . "</p>";
                    };
                }
                "</div>" 
                ?>

            </div>
    </section>

</body>

</html>