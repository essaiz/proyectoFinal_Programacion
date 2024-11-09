function validarFecha() {
    const inputFecha = document.getElementById('fechaIngreso');
    const fechaSeleccionada = new Date(inputFecha.value);
    const diaSemana = fechaSeleccionada.getDay(); 

    if (diaSemana === 6) {
        alert("Por favor selecciona una fecha entre lunes y sábado.");
        inputFecha.value = ""; 
    }
}