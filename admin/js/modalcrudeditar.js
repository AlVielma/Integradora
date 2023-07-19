document.querySelectorAll('.editar-producto').forEach(function (button) {
    button.addEventListener('click', function () {
      var productId = button.getAttribute('data-bs-id');
      var nombre = button.getAttribute('data-bs-nombre');
      var marca = button.getAttribute('data-bs-marca');
      var tipo_lente = button.getAttribute('data-bs-tipo_lente');
      var descripcion = button.getAttribute('data-bs-descripcion');
      var categoria = button.getAttribute('data-bs-categoria');
      var precio = button.getAttribute('data-bs-precio');
      var stock = button.getAttribute('data-bs-stock');
      var imagen = button.getAttribute('data-bs-imagen');


      document.getElementById('nombre').value = nombre;
      document.getElementById('marca').value = marca;
      document.getElementById('tipo_lente').value = tipo_lente;
      document.getElementById('descripcion').value = descripcion;
      document.getElementById('categoria').value = categoria;
      document.getElementById('precio').value = precio;
      document.getElementById('stock').value = stock;
      document.getElementById('imagen').value = imagen;
      document.getElementById('product_id').value = productId;
    });
  });