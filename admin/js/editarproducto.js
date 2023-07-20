document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('modaleditproducto');
    editModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var id = button.getAttribute('data-id');
      var nombre = button.getAttribute('data-nombre');
      var descripcion = button.getAttribute('data-descripcion');
      var precio = button.getAttribute('data-precio');
      var stock = button.getAttribute('data-stock');
      var marca = button.getAttribute('data-marca');
      var lente = button.getAttribute('data-lente');
      var categoria = button.getAttribute('data-categoria');
      var precio = button.getAttribute('data-precio');
  
      var modalId = editModal.querySelector('#edit-id');
      var modalNombre = editModal.querySelector('#edit-nombre');
      var modalDescripcion = editModal.querySelector('#edit-descripcion');
      var modalStock = editModal.querySelector('#edit-stock');
      var modalMarca = editModal.querySelector('#edit-marca');
      var modalLente = editModal.querySelector('#edit-lente');
      var modalCategoria = editModal.querySelector('#edit-categoria');
      var modalPrecio = editModal.querySelector('#edit-precio');
  
      modalId.value = id;
      modalNombre.value = nombre;
      modalDescripcion.value = descripcion;
      modalPrecio.value = precio;
      modalStock.value = stock;
      modalMarca.value = marca;
      modalLente.value = tipo_lente;
      modalCategoria.value = categoria;
    });
  });
  