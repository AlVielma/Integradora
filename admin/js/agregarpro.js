// Datos de categorías
var categorias = [
    { id: 1, nombre: 'Adultos', imagen: 'Img1' },
    { id: 2, nombre: 'Niños', imagen: 'Img2' },
    { id: 3, nombre: 'Solares', imagen: 'Img3' }
  ];

  // Función para cargar las opciones de categoría en el formulario
  function cargarCategorias() {
    var select = document.getElementById('categoria');
    categorias.forEach(function (categoria) {
      var option = document.createElement('option');
      option.value = categoria.id;
      option.textContent = categoria.nombre;
      select.appendChild(option);
    });
  }

  // Función para agregar un nuevo producto al formulario
  document.getElementById('agregarForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Obtener los valores del formulario
    var nombre = document.getElementById('nombre').value;
    var descripcion = document.getElementById('descripcion').value;
    var categoriaId = document.getElementById('categoria').value;
    var precio = document.getElementById('precio').value;
    var cantidad = document.getElementById('cantidad').value;

    // Generar un ID único para el producto
    var id = new Date().getTime();

    // Crear una nueva fila en la tabla de productos
    var productosTabla = document.getElementById('productosTabla');
    var newRow = productosTabla.insertRow();
    newRow.innerHTML = `
      <td>${id}</td>
      <td>${nombre}</td>
      <td>${descripcion}</td>
      <td>${categorias.find(function (categoria) { return categoria.id == categoriaId }).nombre}</td>
      <td>${precio}</td>
      <td>${cantidad}</td>
      <td class="table-actions"><button class="btn btn-danger btn-sm" onclick="eliminarProducto(event)">Eliminar</button></td>
    `;

    // Restablecer los valores del formulario
    document.getElementById('nombre').value = '';
    document.getElementById('descripcion').value = '';
    document.getElementById('categoria').value = '';
    document.getElementById('precio').value = '';
    document.getElementById('cantidad').value = '';
  });

  // Función para eliminar un producto de la tabla
  function eliminarProducto(event) {
    var button = event.target;
    var row = button.closest('tr');
    row.remove();
  }

  // Cargar las opciones de categoría al cargar la página
  cargarCategorias();