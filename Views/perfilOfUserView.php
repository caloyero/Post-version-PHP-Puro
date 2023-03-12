<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
?>

<body>

    //<section class="container-perfil">
        <section class="">
            <?php
            $id = $_GET['id'];
            include("../Controllers/UsuariosController.php");
            $usuarios = new UsuariosController();
            $usuarioPerfil = $usuarios->showUsuariosForId($id);

            //echo $usuarioPerfil['nombre'];
            ?>


            <div class="container-fotoDePortada" style="background-image: url('<?= $usuarioPerfil['foto_de_portada'] ?>')">

                <div class="container-perfil-images">
                    <img class="fotoDePortada" src="<?= $usuarioPerfil['foto_de_portada'] ?>" />

                    <di class="container-user-name">
                        <img class="fotoDePerfil" src="<?= $usuarioPerfil['foto_de_perfil'] ?>" />
                        <h3 class="user-name"><?= $usuarioPerfil['nombre'] ?></h3>
                    </di>

                </div>
                <div class="user-info1">
                    <h3>INFO</h3>
                    <p><?= $usuarioPerfil['nombre'] ?></p>
                    <p><?= $usuarioPerfil['apellido'] ?></p>
                    <p><?= $usuarioPerfil['edad'] ?></p>
                </div>

            </div>';

            <div>
                <div class="container-post">

                    <?php include('../Controllers/PostController.php');

                    $post = new PostController();

                    $postByUsuarios = $post->showAllPostsById($id);
                    foreach ($postByUsuarios as $posts) :
                    ?>

                        <div class="head-post">
                            <img class="fotoDePerfil-post" src="<?php $posts->foto_de_perfil ?>" />
                            <p class="nombreDePerfil-post"><?php $posts['nombre'] ?></p>
                        </div>
                        <div class="container-imagen-post">
                            <img class="imagen-post" src={post.imagen} />
                        </div>
                        <div class="container-contenido">
                            <h2>{post.titulo}</h2>
                            <p>{post.contenido}</p>
                        </div>
                        <div class="comentarios-count">
                            <div>👍{post.likes}</div>
                            <div>Comentarios</div>
                        </div>
                        <div class="comentarios-count">
                            <div>👍</div>
                            <div> 💬 Comentarios</div>
                            <div>✈️ Compartir</div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
</body>

</html>