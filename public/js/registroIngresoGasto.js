$(document).ready(function() {
    $('#submitBtn').click(function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        // Serializar los datos del formulario
        var formData = $('#registroForm').serialize();

        $.ajax({
            type: 'POST',
            url: 'Registro.php', // Asegúrate de que la ruta sea correcta
            data: formData,
            dataType: 'json', // Esperar respuesta en formato JSON
            success: function(response) {
                // Comprobar si hay un mensaje de éxito
                if (response.success) {
                    $('#successMessage').html(response.success).fadeIn().delay(3000).fadeOut();
                } else if (response.error) {
                    $('#successMessage').html('<div class="alert alert-danger">' + response.error + '</div>').fadeIn().delay(3000).fadeOut();
                }
                // Limpiar el formulario después de la respuesta
                $('#registroForm')[0].reset();
            },
            error: function() {
                $('#successMessage').html('<div class="alert alert-danger">Ocurrió un error. Inténtalo de nuevo.</div>').fadeIn().delay(3000).fadeOut();
            }
        });
    });
});

// Función para mostrar mensajes
function showMessage(message, type) {
    const messageContainer = document.getElementById('responseMessage');
    messageContainer.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    messageContainer.style.display = 'block'; // Mostrar el div
    setTimeout(() => {
        messageContainer.style.display = 'none'; // Ocultar el div después de 3 segundos
    }, 3000);
}

   // Obtener la fecha actual
   const today = new Date();
   const yyyy = today.getFullYear();
   const mm = String(today.getMonth() + 1).padStart(2, '0'); // Mes con dos dígitos
   const dd = String(today.getDate()).padStart(2, '0'); // Día con dos dígitos

   // Formatear la fecha como 'YYYY-MM-DD'
   const currentDate = `${yyyy}-${mm}-${dd}`;

   // Asignar la fecha actual al campo de fecha
   document.getElementById('fecha_registro').value = currentDate;

document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM completamente cargado');
    
    var metodoEfectivo = document.getElementById('metodo-efectivo');
    var metodoCheque = document.getElementById('metodo-cheque');
    
    console.log('Método Efectivo:', metodoEfectivo);
    console.log('Método Cheque:', metodoCheque);
    
    if (metodoEfectivo && metodoCheque) {
        metodoEfectivo.addEventListener('click', function () {
            console.log('Método efectivo seleccionado');
            mostrarFormulario('efectivo');
        });

        metodoCheque.addEventListener('click', function () {
            console.log('Método cheque seleccionado');
            mostrarFormulario('cheque');
        });
    } else {
        console.error("Los elementos no se encontraron en el DOM.");
    }

    function mostrarFormulario(metodo) {
        var chequeSection = document.getElementById('cheque-section');
        if (metodo === 'efectivo') {
            chequeSection.style.display = 'none';  // Ocultar campo de cheque si el método es efectivo
        } else if (metodo === 'cheque') {
            chequeSection.style.display = 'block'; // Mostrar campo de cheque si el método es cheque
        }
    }
});


document.addEventListener('DOMContentLoaded', function () {
    // Manejadores para mostrar el formulario según el método de pago
    document.getElementById('metodo-efectivo').addEventListener('click', function () {
        mostrarFormulario('efectivo');
    });

    document.getElementById('metodo-cheque').addEventListener('click', function () {
        mostrarFormulario('cheque');
    });

    function mostrarFormulario(metodo) {
        var chequeSection = document.getElementById('cheque-section');

        // Mostrar u ocultar la sección del cheque según el método seleccionado
        if (metodo === 'efectivo') {
            chequeSection.style.display = 'none';  // Ocultar campo de cheque si el método es efectivo
        } else if (metodo === 'cheque') {
            chequeSection.style.display = 'block'; // Mostrar campo de cheque si el método es cheque
        }
    }
});


document.getElementById('numero_cheque').addEventListener('blur', function () {
var numeroCheque = this.value;

// Hacer una petición AJAX para obtener el ID del cheque
if (numeroCheque) {
    fetch('obtener_id_cheque.php?numero_cheque=' + numeroCheque)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Guardar el ID del cheque en un campo oculto
                document.getElementById('cheque-id').innerText = data.id_cheque;
            } else {
                alert('Número de cheque no encontrado.');
            }
        })
        .catch(error => console.error('Error:', error));
}
});

document.getElementById('numero_cheque').addEventListener('input', function () {
    const numeroCheque = this.value;

    if (numeroCheque.length > 0) {
        // Llamada AJAX para verificar si el número de cheque existe
        fetch('validar_cheque.php?numero_cheque=' + encodeURIComponent(numeroCheque))
            .then(response => response.json())
            .then(data => {
                const chequeIdDiv = document.getElementById('cheque-id');
                if (data.exists) {
                    chequeIdDiv.style.display = 'block';
                    chequeIdDiv.innerHTML = `<span style="color: green;">Cheque encontrado! ID: ${data.id_cheque}</span>`;
                } else {
                    chequeIdDiv.style.display = 'block';
                    chequeIdDiv.innerHTML = '<span style="color: red;">Número de cheque no encontrado.</span>';
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('cheque-id').style.display = 'none';
    }
});

// Validar Descripción (solo letras y números)
function validarDescripcion(event) {
    var regex = /^[a-zA-Z0-9\s]*$/; // Permitir solo letras, números y espacios
    if (!regex.test(event.key)) {
        event.preventDefault(); // Evitar que se ingrese el carácter no válido
    }
}

// Validar Monto (solo números y un punto decimal)
function validarMonto(event) {
    var regex = /^[0-9]*\.?[0-9]{0,2}$/; // Permitir solo números y un punto seguido de hasta 2 decimales
    var input = $(this).val() + event.key; // Valor actual + la tecla que se intenta insertar
    if (!regex.test(input)) {
        event.preventDefault(); // Evitar que se ingrese el carácter no válido
    }
}

// Validar Número de Cheque (solo letras y números)
function validarNumeroCheque(event) {
    var regex = /^[a-zA-Z0-9]*$/; // Permitir solo letras y números
    if (!regex.test(event.key)) {
        event.preventDefault(); // Evitar que se ingrese el carácter no válido
    }
}

// Validar Comentarios Adicionales (solo letras y números)
function validarComentariosAdicionales(event) {
    var regex = /^[a-zA-Z0-9\s]*$/; // Permitir solo letras, números y espacios
    if (!regex.test(event.key)) {
        event.preventDefault(); // Evitar que se ingrese el carácter no válido
    }
}

$(document).ready(function() {
    // Aplicar validación a los inputs
    $('#descripcion').on('keypress', validarDescripcion);
    $('#monto').on('keypress', validarMonto);
    $('#numero_cheque').on('keypress', validarNumeroCheque);
    $('#comentarios_adicionales').on('keypress', validarComentariosAdicionales);
});


/*

// Validar Descripción (solo letras y números)
function validarDescripcion() {
    var descripcion = $('#descripcion').val();
    var regex = /^[a-zA-Z0-9\s]+$/;
    if (!regex.test(descripcion)) {
        $('#descripcion').addClass('is-invalid').removeClass('is-valid');
    } else {
        $('#descripcion').addClass('is-valid').removeClass('is-invalid');
    }
}

// Validar Monto (números, un solo punto y dos decimales)
function validarMonto() {
    var monto = $('#monto').val();
    var regex = /^\d+(\.\d{1,2})?$/;
    if (!regex.test(monto)) {
        $('#monto').addClass('is-invalid').removeClass('is-valid');
    } else {
        $('#monto').addClass('is-valid').removeClass('is-invalid');
    }
}

// Validar Número de Cheque (solo letras y números)
function validarNumeroCheque() {
    var numeroCheque = $('#numero_cheque').val();
    if (numeroCheque === '') {
        $('#numero_cheque').removeClass('is-invalid is-valid'); // Eliminar clases si está vacío (opcional)
        return;
    }
    var regex = /^[a-zA-Z0-9]+$/;
    if (!regex.test(numeroCheque)) {
        $('#numero_cheque').addClass('is-invalid').removeClass('is-valid');
    } else {
        $('#numero_cheque').addClass('is-valid').removeClass('is-invalid');
    }
}

// Validar Comentarios Adicionales (solo letras y números)
function validarComentariosAdicionales() {
    var comentarios = $('#comentarios_adicionales').val();
    var regex = /^[a-zA-Z0-9\s]+$/;
    if (!regex.test(comentarios)) {
        $('#comentarios_adicionales').addClass('is-invalid').removeClass('is-valid');
    } else {
        $('#comentarios_adicionales').addClass('is-valid').removeClass('is-invalid');
    }
}


$(document).ready(function() {
    // Llamar validaciones en tiempo real mientras el usuario escribe
    $('#descripcion').on('input', validarDescripcion);
    $('#monto').on('input', validarMonto);
    $('#numero_cheque').on('input', validarNumeroCheque);
    $('#comentarios_adicionales').on('input', validarComentariosAdicionales);
});
*/
