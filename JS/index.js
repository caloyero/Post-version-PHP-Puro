/* // Obtén el botón o enlace que abrirá el modal
var openModalButton = document.querySelector('#openModalButton');

// Obtén el modal y la capa de fondo
var modal = document.querySelector('#myModal');
var modalBackground = document.querySelector('.modal-background');

// Agrega un controlador de eventos al botón para abrir el modal
openModalButton.addEventListener('click', function() {
  modal.classList.add('active');
  modalBackground.classList.add('active');
});

// Agrega un controlador de eventos a la capa de fondo para cerrar el modal
modalBackground.addEventListener('click', function() {
  modal.classList.remove('active');
  modalBackground.classList.remove('active');
}); */
document.write('<h1>texto escrito en JavaScript</h1>')
