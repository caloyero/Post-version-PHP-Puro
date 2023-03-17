<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
include('../Controllers/UsuariosController.php');



?>
<body>
<section>
            <form id="login" class="login"
            action="../Config/actions.php?accion=autenticar" method="post"
            >
                <img
                    class="logo-login"
                    src="../Images/images/logo.png"
                    alt="foto de perfil"
                />

                <input class="input" type="text" placeholder="Email"
                    name="email"
                    required
                />


                <input class="input" type="password" placeholder="Password"
                    name="password"
                    required
                />

                <input class="login-button" type="submit" value="Login"

                />
                <a href="../Views/createUsuario.php">Crear Una Cuenta</a>
            </form>
           <!--  {myLogin === 'true' && <Postlist />} -->
        </section>
    
</body>
</html>