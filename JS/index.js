
const posts = document.querySelectorAll('.container-post')
const comentariosBtn = document.querySelectorAll('.comentarios-btn');
const showComentarios = document.querySelectorAll('.container-comentarios')

comentariosBtn.forEach(post => {

  post.addEventListener('click', () => {
    let idComentario = post.dataset.id
    console.log(idComentario);

    showComentarios.forEach(show => {
      let id = show.dataset.id;
      if (idComentario == id) {
        console.log(id)
        show.classList.toggle('show-comentarios')
      }
      //console.log(id)

    })

  });
})







