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

    <section class="container-home">
        <div class="user-home">
            <h2>Contactos</h2>
            <a></a>
            <?php

            include('../Controllers/UsuariosController.php');
            include('../Controllers/ComentariosController.php');
            $usuariosView = new UsuariosController();
            $result = $usuariosView->showUsuariosListByCreateChat();
            $listComentarios = new ComentariosController();


            for ($i = 0; $i < count($result); $i++) {


                ?>
            <div class="user-home-list">
                <a href="./chatCreate.php?id_receptor=<?= $result[$i]['id'] ?>">
                    <img class="chat-user-info-image" src="../ImagenPerfil/<?= $result[$i]['foto_de_perfil'] ?>" />
                    <p>
                        <?= $result[$i]["nombre"] ?>
                    </p>
                    <p>
                        <?= $result[$i]["apellido"] ?>
                    </p>
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="container-list">
            <?php
            include_once('../Controllers/PostController.php');
            $postController = new PostController();
            $result = $postController->showAllPosts();

            for ($i = 0; $i < count($result); $i++) {
                $listComentario = $listComentarios->contarComentariosById($result[$i]['id']);
                $showComentarios = $listComentarios->showComentariosById($result[$i]['id']);
                ?>



            <div class="container-post" data-id="<?= $result[$i]['id'] ?>">
                <div class="head-post">
                    <img class="fotoDePerfil-post" src="../ImagenPerfil/<?= $result[$i]['foto_de_perfil'] ?>" />
                    <p class="user-text-post">
                        <?= $result[$i]['nombre'] ?>
                    </p>
                </div>
                <div class="container-imagen-post">
                    <img class="imagen-post" src="../ImagenesPost/<?= $result[$i]['imagen'] ?>" />
                </div>
                <div class="container-contenido">
                    <h2>
                        <?= $result[$i]['titulo'] ?>
                    </h2>
                    <p>
                        <?= $result[$i]['contenido'] ?>
                    </p>
                </div>
                <div class="comentarios-count">
                    <div>
                        <?php 
                        if (empty($result[$i]['likes'])) {
                        ?>
                        <img src="../images/images/amor (2).png" alt="">
                        <?php 
                         }else{
                        ?>
                        <img src="../images/images/amor.png" alt="">
                        <p>
                            <?= $result[$i]['likes'] ?>
                        </p>
                        <?php 
                        }
                        ?>


                    </div>
                    <div>
                        <p>Comentarios</p>
                        <p>
                            <?= $listComentario ?>
                        </p>
                    </div>
                </div>
                <!-- container comentarios -->
                <div class="container-comentarios" data-id="<?= $result[$i]['id'] ?>">
                    <?php
                    if (empty($listComentario)) {

                        echo 'No Hay Comentarios';
                        ?><br>
                    <img src="../images/images/sin comentarios.png" alt="">

                    <?php
                    }else {
                            foreach ($showComentarios as $showComentario) {
                                ?>
                    <div class="comentarios">
                        <img class='chat-user-info-image' src="../ImagenPerfil/<?= $showComentario['foto_de_perfil'] ?>"
                            alt="">
                        <h3>
                            <?= $showComentario['nombre'] ?>
                        </h3>
                        <p>
                            <?= $showComentario['comentario'] ?>
                        </p>
                    </div>
                    <?php
                            }
                        }
                        ?>
                    <!-- formulario para crear comentario -->
                    <div>
                        <form class="form-comentarios" action="../Config/actions.php?accion=crearComentario"
                            method="post">
                            <input type="hidden" name="usuarios_id" value="<?= $id ?>">
                            <input type="hidden" name="post_id" value="<?= $result[$i]['id'] ?>">
                            <input class="input-comentarios" type="text" name="comentario">
                            <button class="boton-comentarios" type="submit"><img src="../images/images/directo.png"
                                    alt=""></button>
                        </form>
                    </div>
                </div>
                <!-- formulario para crear comentario -->
                <!-- final container comentarios -->
                <div class="comentarios-count">

                    <form action="../Config/actions.php?accion=likes" method="post">
                        <input id="id" type="hidden" name="id_post" value="<?= $result[$i]['id'] ?>">
                        <input id="likes" type="hidden" name="likes" value="<?= $result[$i]['likes'] ?>">
                        <button type="submit" class="btn-likes" data-id="<?= $result[$i]['id'] ?>"><img
                                src="../images/images/amor (1).png" alt="boton compartir"></button>
                        <!--<input class="btn-likes" type="submit" value="👍" onclick="Javascript:DarLike()">  -->
                    </form>

                    <!-- <button class="" onclick ="comentar()">💬 Comentarios</button> -->
                    <button class="comentarios-btn" data-id="<?= $result[$i]['id'] ?>"><img
                            src="../images/images/comentarios.png" alt="boton compartir"></button>
                    <p id="compartir"><img src="../images/images/cuota.png" alt="boton compartir"></p>





                </div>


            </div>

            <?php }

            ?>

        </div>
    </section>
</body>


<script type="text/javascript">
function DarLikes() {
    let id_post = document.getElementById('id').value;
    let likes = document.getElementById('likes').value;

    $.ajax({
            type: 'post',
            url: '../Config/actions.php?accion=likes',
            data: ('id_post=' + id_post + '&likes=' + likes)
            success: function(response) {
                if (response == "1") {
                    $ '(#compartir').html('exito');
            }
            else {
                $ '(#compartir').html('fracaso');
        }
    })
}
/*  $('.btn-like').on('click', function() {
                                 var id = $(this).data('id');
                                 $.ajax({
                                   type: 'POST',
                                   url: '../Config/actions.php?accion=likes',
                                   data: {
                                     id: id
                                   },
                                   success: function(response) {
                                     // Actualizar el contador de likes en la página
                                     $('.like-count[data-id="' + id + '"]').text(response);
                                   }
                                 });
                               }); */
</script>

</html>