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
include('../Controllers/ComentariosController.php');
$post_id = $_GET['post_id'];
print_r($post_id);
$listComentarios = new ComentariosController();
$listComentario = $listComentarios->showComentariosById($post_id);

?>

<body>
    crear comentarios

    <section class="container-list-comentarios">
        <div class="list-comentarios">
            <?php foreach ($listComentario as $list) {?>
                <div class="comentarios">
                    <img class='chat-user-info-image' src="../ImagenPerfil/<?= $list['foto_de_perfil'] ?>" alt="">
                    <h3><?= $list['nombre'] ?></h3>
                    <p><?= $list['comentario'] ?></p>
                </div>
            <?php } ?>
        </div>
        <div >
            <form class="form-comentarios" action="../Config/actions.php?accion=crearComentario" method="post">
                <input type="hidden" name="usuarios_id" value="<?=$id?>">
                <input type="hidden" name="post_id" value="<?=$post_id?>">
                <input class="input-comentarios" type="text" name="comentario">
                <button class="boton-comentarios" type="submit">Comentar</button>
            </form>
        </div>
            
          
    </section>


</body>

</html>