<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
include('../Controllers/UsuariosController.php');



?>
<body>
<section>
    
            <form  class="crear-usuario"
            action="../Config/actions.php?accion=crearUsuario" method="post" enctype="multipart/form-data"
            >
            
                <img
                    class="logo-login"
                    src="../Images/images/logo.png"
                    alt="foto de perfil"
                />
                <h1>Crear una Cuenta</h1>
                <input class="input" type="text" placeholder="Nombre"
                    name="nombre"
                    required
                />
                <input class="input" type="text" placeholder="Apellido"
                    name="apellido"
                    required
                />
                <input class="input" type="number" placeholder="Edad"
                    name="edad"
                    required
                />
                <label for="">Foto de Perfil</label>
                <input  type="file" 
                    name="foto_de_perfil"
                
                />
                <label for="">Foto de Portada</label>
                <input  type="file"
                    name="foto_de_portada"
                    required
                />
                <input class="input" type="text" placeholder="Email"
                    name="email"
                    required
                />


                <input class="input" type="password" placeholder="Password"
                    name="password"
                    required
                />

                <input class="" type="submit" value="Crear Cuenta"

                />
                <a href="../Views/Login.php">Login</a>
            </form>
           <!--  {myLogin === 'true' && <Postlist />} -->
        </section>
    
</body>
</html>