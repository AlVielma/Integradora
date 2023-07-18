// Función para cancelar una cita
function cancelarCita(button) {
    var agendaItem = button.parentNode;
    agendaItem.parentNode.removeChild(agendaItem);
  }