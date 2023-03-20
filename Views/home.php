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
            <p><?= $result[$i]["nombre"] ?></p>
            <p><?= $result[$i]["apellido"] ?></p>
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
        $listComentario = $listComentarios->contarComentariosById($result[$i]['id'])
      ?>



        <div class="container-post">
          <div class="head-post">
            <img class="fotoDePerfil-post" src="../ImagenPerfil/<?= $result[$i]['foto_de_perfil'] ?>" />
            <p class="user-text-post"><?= $result[$i]['nombre'] ?></p>
          </div>
          <div class="container-imagen-post">
            <img class="imagen-post" src="../ImagenesPost/<?= $result[$i]['imagen'] ?>" />
          </div>
          <div class="container-contenido">
            <h2><?= $result[$i]['titulo'] ?></h2>
            <p><?= $result[$i]['contenido'] ?></p>
          </div>
          <div class="comentarios-count">
            <div> 👍<?= $result[$i]['likes'] ?></div>
            <div>Comentarios <?= $listComentario ?></div>
          </div>
          <div class="comentarios-count">
            <form action="../Config/actions.php?accion=likes" method="post">
              <input type="hidden" name="id_post" value="<?= $result[$i]['id'] ?>">
              <input type="hidden" name="likes" value="<?= $result[$i]['likes'] ?>">
              <input type="submit" value="👍">
            </form>
            <div>
              <li>
                <!-- <button class="" onclick ="comentar()">💬 Comentarios</button> -->
                <a href="./crearComentarios.php?post_id=<?= $result[$i]['id'] ?>">crear comentarios</a>
              </li>
            </div>
            <div>✈️ Compartir</div>


          </div>


        </div>

      <?php }

      ?>

    </div>
  </section>
</body>


<!-- <script>
  $('.btn-like').on('click', function() {
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
  });
</script> -->

</html>