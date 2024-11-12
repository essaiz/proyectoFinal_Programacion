function validarFecha() {
    const inputFecha = document.getElementById('fechaIngreso');
    const fechaSeleccionada = new Date(inputFecha.value);
    const diaSemana = fechaSeleccionada.getDay(); 

    if (diaSemana === 6) {
        alert("Por favor selecciona una fecha entre lunes y sábado.");
        inputFecha.value = ""; 
    }
}

function validarHorarioIngresoSalida() {
    const inputHoraIngreso = document.getElementById('horaIngreso');
    const inputHoraSalida = document.getElementById('horaSalida');
    const fechaSeleccionada = new Date(document.getElementById('fechaIngreso').value);
    const diaSemana = fechaSeleccionada.getDay(); 
    const [horaIngreso, minutoIngreso] = inputHoraIngreso.value.split(':');
    const horaIngresoDate = new Date(fechaSeleccionada);
    horaIngresoDate.setHours(horaIngreso, minutoIngreso);
    const [horaSalida, minutoSalida] = inputHoraSalida.value.split(':');
    const horaSalidaDate = new Date(fechaSeleccionada);
    horaSalidaDate.setHours(horaSalida, minutoSalida);

    const horarioSemanaInicio = new Date(fechaSeleccionada);
    horarioSemanaInicio.setHours(7, 0); // 07:00 AM
    const horarioSemanaFin = new Date(fechaSeleccionada);
    horarioSemanaFin.setHours(20, 50); // 08:50 PM
    const horarioSabadoFin = new Date(fechaSeleccionada);
    horarioSabadoFin.setHours(16, 30); // 04:30 PM

    if (diaSemana >= 0 && diaSemana <= 4) {
        if (horaIngresoDate < horarioSemanaInicio || horaIngresoDate > horarioSemanaFin) {
            alert("Ingreso de lunes a viernes. Debe estar entre las 7:00 am y las 8:50 pm.");
            inputHoraIngreso.value = ""; 
            return false;
        }
        if (inputHoraSalida.value && (horaSalidaDate < horaIngresoDate || horaSalidaDate > horarioSemanaFin)) {
            alert("Horario salida para lunes a viernes. Debe ser posterior al horario de ingreso y estar antes de las 8:50 pm.");
            inputHoraSalida.value = "";
            return false;
        }
    }
    if (diaSemana === 5) {
        if (horaIngresoDate < horarioSemanaInicio || horaIngresoDate > horarioSabadoFin) {
            alert("Horario sábados. 7:00 am - 4:30 pm.");
            inputHoraIngreso.value = ""; 
            return false;
        }
        if (inputHoraSalida.value && (horaSalidaDate < horaIngresoDate || horaSalidaDate > horarioSabadoFin)) {
            alert("El horario de salida para sábados. Debe ser posterior al horario de ingreso y estar antes de las 4:30 pm.");
            inputHoraSalida.value = ""; 
            return false;
        }
    }
    return true;
}
document.getElementById('fechaIngreso').addEventListener('change', validarFecha);
document.getElementById('horaIngreso').addEventListener('change', validarHorarioIngresoSalida);
document.getElementById('horaSalida').addEventListener('change', validarHorarioIngresoSalida);
