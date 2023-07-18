// Función para agregar un nuevo trabajador al formulario
function agregarTrabajador(event) {
    event.preventDefault();

    // Obtener los valores del formulario
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var gmail = document.getElementById('gmail').value;
    var telefono = document.getElementById('telefono').value;
    var contrasena = document.getElementById('contrasena').value;

    // Crear un objeto de trabajador
    var trabajador = {
      nombre: nombre,
      apellido: apellido,
      gmail: gmail,
      telefono: telefono,
      contrasena: contrasena
    };

    // Agregar el trabajador a la lista
    var lista = document.getElementById('trabajadoresLista');
    var li = document.createElement('li');
    li.classList.add('list-group-item');
    li.innerHTML = `
      <div class="d-flex justify-content-between">
        <div>${trabajador.nombre} ${trabajador.apellido}</div>
        <div>${trabajador.gmail}</div>
      </div>
    `;
    lista.appendChild(li);

    // Limpiar los campos del formulario
    document.getElementById('agregarForm').reset();
  }

  // Agregar el evento submit al formulario
  document.getElementById('agregarForm').addEventListener('submit', agregarTrabajador);