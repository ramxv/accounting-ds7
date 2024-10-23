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

