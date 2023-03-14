<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
include("../Controllers/UsuariosController.php");
session_start();
$id = $_SESSION['id_usuario'];
if ($id == null || empty($id)) {

    header('location:Login.php');
    die();
}
?>

<body>

    <section class="container-perfil">
        <div>
            <div class="container-post">

                <?php include('../Controllers/PostController.php');

                $usuariosController = new UsuariosController();

                $usuario = $usuariosController->showUsuariosForId($id);

                ?>

                <div class="head-post">
                    <img class="fotoDePerfil-post" src="<?= $usuario["foto_de_perfil"] ?>" />
                    <p class="nombreDePerfil-post"><?= $usuario['nombre'] ?></p>
                </div>

                <form class="fornm-crear-post" action="../Config/actions.php?accion=crearPost" method="post" enctype="multipart/form-data">
                    <label for="titulo"> titulo</label>
                    <input type="text" name="titulo">
                    <label for="contenido"> contenido</label>
                    <input type="text" name="contenido">
                    <input type="hidden" name="usuarios_id" value="<?=$usuario['id']?>">
                    <input type="hidden" name="likes" value="0">
                    <label for="imagen"> imagen</label>
                    <input type="file" name="imagen">
                    <input type="hidden" name="notificaciones_id" value="0">
                    <input type="submit" value="Postear">
                </form>

            </div>
        </div>

    </section>


</body>

</html>