// Obtener los elementos
const openOffcanvasBtn = document.getElementById('openOffcanvas');
const closeOffcanvasBtn = document.getElementById('closeOffcanvas');
const offcanvas = document.getElementById('myOffcanvas');

// Abrir el offcanva
openOffcanvasBtn.addEventListener('click', () => {
  offcanvas.classList.add('offcanvas-show');
});

// Cerrar el offcanvas al presionar la "X"
closeOffcanvasBtn.addEventListener('click', () => {
  offcanvas.classList.remove('offcanvas-show');
});

// Cerrar el offcanvas al hacer clic fuera de él
document.addEventListener('click', (event) => {
  if (!offcanvas.contains(event.target) && !openOffcanvasBtn.contains(event.target)) {
    offcanvas.classList.remove('offcanvas-show');
  }
});