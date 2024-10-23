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
