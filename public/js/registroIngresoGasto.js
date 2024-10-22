$(document).ready(function() {
  $('#submitBtn').click(function(event) {
      event.preventDefault(); // Evitar el envío normal del formulario

      // Serializar los datos del formulario
      var formData = $('#registroForm').serialize();

      $.ajax({
          type: 'POST',
          url: 'Registro.php', // Asegúrate de que la ruta sea correcta
          data: formData,
          success: function(response) {
              // Mostrar el mensaje de respuesta en el div
              $('#successMessage').html(response).fadeIn().delay(3000).fadeOut(); // Mostrar durante 3 segundos
              // Limpiar el formulario después de la respuesta
              $('#registroForm')[0].reset();
          },
          error: function() {
              $('#successMessage').html('<div class="alert alert-danger">Ocurrió un error. Inténtalo de nuevo.</div>');
          }
      });
  });
});



$(document).ready(function() {
  // Interceptar el clic en el botón "Registrar Cheque"
  $('#registrarCheque').on('click', function(event) {
    event.preventDefault(); // Evitar el comportamiento predeterminado del botón

    // Capturar los datos del formulario
    var formData = $('#chequeForm').serialize(); // Serializamos los datos del formulario

    // Hacer la solicitud AJAX para registrar el cheque
    $.ajax({
      url: 'chequeForm.php', // La ruta a tu archivo PHP que procesa el formulario
      type: 'POST',
      data: formData,
      success: function(response) {
        // Mostrar el mensaje de éxito o error que viene como respuesta
        alert(response);
        $('#closeOffcanvas').click(); // Opcional: cerrar el offcanvas
        $('#chequeForm')[0].reset(); // Limpiar el formulario
      },
      error: function(xhr, status, error) {
        // Manejar errores de la solicitud
        console.error(error);
        alert('Ocurrió un error al registrar el cheque.');
      }
    });
  });
});



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

function showMessage(message, type) {
    const messageContainer = document.getElementById('responseMessage');
    messageContainer.innerHTML = `<div class="alert alert-${type}" id="successMessage">${message}</div>`;
}

