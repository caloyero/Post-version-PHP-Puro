<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
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
          <a href="./chatCreate.php?id&id_receptor=' <?= $result[$i]['id'] ?>">
            <img class="chat-user-info-image" src="<?= $result[$i]['foto_de_perfil'] ?>" />
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

        echo '

        <div class="container-post">
          <div class="head-post">
            <img class="fotoDePerfil-post" src="<?= $result[$i]['foto_de_perfil'] ?>" />
            <p class="user-text-post"><?= $result[$i]['nombre'] ?></p>
          </div>
          <div class="container-imagen-post">
            <img class="imagen-post" src="<?= $result[$i]['imagen'] ?>" />
          </div>
          <div class="container-contenido">
            <h2><?= $result[$i]['titulo'] ?></h2>
            <p><?= $result[$i]['contenido'] ?></p>
          </div>
          <div class="comentarios-count">
            <div>👍 </div>
            <div>Comentarios</div>
          </div>
          <div class="comentarios-count">
            <ul>
              <div>👍</div>
              <div>
                <li>
                  <Link class="" href="">💬 Comentarios</Link>
                </li>
              </div>
              <div>✈️ Compartir</div>
            </ul>
          </div>
        </div>
        ';
      <?php }

      ?>

    </div>
  </section>
</body>

</html>