<!DOCTYPE html>
<html lang="en">
<?php
include('./header.php');
?>

<body>
    <section className="chat-container">
        <div className="container-content-chat">
            <div className="container-list-perfil">
                <?php


                echo "<div class'chat-user-info'>
                         <p>{userChat.nombre}</p>
                         <img
                           className='chat-user-info-image'
                            src={userChat.foto_de_perfil}/>
                      </div>";
                ?>


                <Emisor />
            </div>
            <div className="container-chat">

                <Mensajes />
               <!--  <form onSubmit={handleSubmitMessage}>
                    <input type="text" onChange={e=> setMassages(e.target.value)} />
                    <button>
                        <img src={require("../images/directo.png")} alt="" />
                    </button>
                </form> -->
            </div>
        </div>
    </section>

</body>

</html>