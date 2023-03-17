<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
include('../Controllers/UsuariosController.php');
session_start();
$id = $_SESSION['id_usuario'];
if ($id == null || empty($id)) {

    header('location:Login.php');
    die();
}

//echo $usuarioPerfil['nombre'];



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
                    <img class="fotoDePerfil-post" src="../ImagenPerfil/<?= $usuario["foto_de_perfil"] ?>" />
                    <p class="nombreDePerfil-post"><?= $usuario['nombre'] ?></p>
                </div>

                <!-- <form class="fornm-crear-post" action="../Config/actions.php?accion=crearPost" method="post" enctype="multipart/form-data"> -->
                <form class="fornm-crear-post" action="../Config/actions.php?accion=actualizarUsuario" method="post" enctype="multipart/form-data">
                        <h1>Actualizar Datos</h1>
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                        <input class="" type="text" value="<?= $usuario['nombre'] ?>" name="nombre" />
                        <input class="input" type="text" value="<?= $usuario['apellido'] ?>" name="apellido" />
                        <input class="input" type="number" value="<?= $usuario['edad'] ?>" name="edad" />
                        <label for="">Foto de Perfil</label>
                        <img src="../ImagenPerfil/<?= $usuario['foto_de_perfil'] ?>" alt="50px" style="width: min-content;">
                        <input type="file" name="foto_de_perfil" value="" />
                        <label for="">Foto de Portada</label>
                        <img src="../ImagenPortada/<?= $usuario['foto_de_portada'] ?>" alt="50px" style="width: 150px;">
                        <input type="file" name="foto_de_portada" value="" />
                        <input class="input" type="text" value="<?= $usuario['email'] ?>" name="email" />
                        <input class="input" type="password" value="<?= $usuario['password'] ?>" name="password" />
                        <input class="" type="submit" value="actualizar" />
                </form>
                <!-- </form> -->

            </div>
        </div>

    </section>


</body>

<!-- <body>
    
    
        <form class="fornm-crear-post" action="../Config/actions.php?accion=actualizarUsuario" method="post" enctype="multipart/form-data">

            <h1>Crear una Cuenta</h1>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input class="input" type="text" placeholder="nombre" name="nombre" value="<?= $nombre ?>" />
            <input class="input" type="text" placeholder="Apellido" name="apellido" required />
            <input class="input" type="number" placeholder="Edad" name="edad" required />
            <label for="">Foto de Perfil</label>
            <input type="file" name="foto_de_perfil" />
            <label for="">Foto de Portada</label>
            <input type="file" name="foto_de_portada" required />
            <input class="input" type="text" placeholder="Email" name="email" required />


            <input class="input" type="password" placeholder="Password" name="password" required />

            <input class="" type="submit" value="Crear Cuenta" />
            <a href="../Views/Login.php">Login</a>
        </form>
        <!--  {myLogin === 'true' && <Postlist />} -->

</body> -->

</html>