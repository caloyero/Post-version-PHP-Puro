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
      $usuariosView = new UsuariosController();
      $result = $usuariosView->showUsuariosListByCreateChat();

      for ($i = 0; $i < count($result); $i++) { ?>
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

      for ($i = 0; $i < count($result); $i++) { ?>



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

            <?php $likes = $result[$i]['likes'];
            $newLikes = $likes + 1;
            ?>
            <form action="../Config/actions.php?accion=likes" method="post">
              <input type="hidden" name="id" value="<?= $result[$i]['id'] ?>">
              <input type="hidden" name="newLikes" value="<?= $newLikes  ?>">

              <input type="button" value="👍">
              <div> <?= $result[$i]['likes'] ?></div>
            </form>
            <div> <?= $result[$i]['likes'] ?></div>
            <!--  <?= $newLikes ?> -->
            <button class="btn-like" data-id="<?= $result[$i]['id'] ?>">Like</button>

            <div>Comentarios</div>
          </div>
          <div class="comentarios-count">

            <div>👍</div>
            <div>
              <li>
                <a class="" href="./crearComentarios.php">💬 Comentarios</a>
              </li>
            </div>
            <div>✈️ Compartir</div>
            <button id="openModalButton" onclick="openModalButton()">Abrir modal</button>

          </div>
          <!-- <div id="myModal" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
              
              <h2>¡Bienvenido!</h2>
              <p>Este es el contenido del modal.</p>
              <button id="closeModalButton">Cerrar</button>

            </div>
          </div> -->

        </div>

      <?php }

      ?>

    </div>
  </section>
</body>
<script src="../JS/index.js"></script>

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