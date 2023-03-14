<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
session_start();
$id = $_SESSION['id_usuario'];
if($id == null || empty($id))
{
   
   header('location:Login.php');
   die();
  
}
?>

<body>

    //<section class="container-perfil">
        <section class="">
            <?php
            include("../Controllers/UsuariosController.php");
            $usuarios = new UsuariosController();
            $usuarioPerfil = $usuarios->showUsuariosForId($id);

            //echo $usuarioPerfil['nombre'];
            ?>


            <div class="container-fotoDePortada" style="background-image: url('/* <?= $usuarioPerfil['foto_de_portada'] ?> */')">

                <div class="container-perfil-images">
                    <img class="fotoDePortada" src="<?= $usuarioPerfil['foto_de_portada'] ?>" />

                    <di class="container-user-name">
                        <img class="fotoDePerfil" src="<?= $usuarioPerfil['foto_de_perfil'] ?>" />
                        <h3 class="user-name"><?= $usuarioPerfil['nombre'] ?></h3>
                    </di>

                </div>
                <div class="user-info1">
                    <h3>INFO</h3>
                    <p class="usuario-name"><?= $usuarioPerfil['nombre'] ?></p>
                    <p><?= $usuarioPerfil['apellido'] ?></p>
                    <p><?= $usuarioPerfil['edad'] ?></p>
                    <button><a href="../Config/cerrarSession.php">Cerrar Sesion</a></button>
                    <button><a href="./creatPost.php">Crear Post</a></button>
                    
                </div>

            </div>

            <div>
                <div class="container-post">

                    <?php include('../Controllers/PostController.php');

                    $post = new PostController();

                    $postByUsuarios = $post->showAllPostsById($id);
                    foreach ($postByUsuarios as $posts){
                        
                    ?>

                        <div class="head-post">
                            <img class="fotoDePerfil-post" src="<?= $posts["foto_de_perfil"] ?>" />
                            <p class="nombreDePerfil-post"><?=$posts['nombre'] ?></p>
                        </div>
                        <div class="container-imagen-post">
                            <img class="imagen-post" src="<?=$posts["imagen"]?>" />
                        </div>
                        <div class="container-contenido">
                            <h2><?=$posts["titulo"]?></h2>
                            <p><?=$posts["contenido"]?></p>
                        </div>
                        <div class="comentarios-count">
                            <div>👍<?=$posts["likes"]?></div>
                            <div>Comentarios</div>
                        </div>
                        <div class="comentarios-count">
                            <div>👍</div>
                            <div> 💬 Comentarios</div>
                            <div>✈️ Compartir</div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
</body>

</html>