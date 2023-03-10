<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
?>

<body>
    <section class="chat-container">
        <div class="container-content-chat">
            <div class="container-list-perfil">
                <?php
                include('../Controllers/ChatsController.php');

                $id_receptor = $_GET['id_receptor'];
                $id_creador = $_GET['id'];
                     $chats = new ChatsController();
                    /*  $chatCreate = $chats->formCreateChats($id,$mesaje,$id_creador,$id_receptor,$time); */
                    ?>
                    
                <div class='chat-user-info'>
                         <p></p>
                         <img
                           class='chat-user-info-image'
                            src={userChat.foto_de_perfil}/>
                      </div>

            </div>
            <div class='container-chat'>
            <!-- for ($i = 0; $i < count($chat); $i++)
            {   
                if($id_usuario ==$chat[$i]['id_creador'])
                {
                    echo "
                   
                    <p style='text-align: center;border-radius: 1em 15em;padding: 1em;max-width:40%;margin-left: 5%;background-color:white;color:#6C4AB6'>".$chat[$i]['mensaje']."</p>";
                }else{
                    echo "
                    <p style='text-align: center;border-radius: 15em 1em;padding: 1em;width:40%; margin-left: 45%;background-color:#8b9dc3;color:#f7f7f7'>".$chat[$i]['mensaje']."</p>";
                }
             ;
                 
            } -->

            <form action="" method="post">
                <input type="hidden" type="number" name="id_creador" value= "<?=$id_creador?>" />
                <input type="hidden" type="number" name="id_recetor" value= "<?=$id_creador?>" />
                <input type="text" name="mensaje" name="mensaje" />
                <input type="submit" name="crear" value="Enviar"/>
            </form>
            </div>
           
               
        </div>
    </section>

</body>

</html>