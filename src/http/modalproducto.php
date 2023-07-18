<!-- Modal -->
<div class="modal fade" id="modalproducto" tabindex="-1" aria-labelledby="modalproudcto" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Formulario para agregar un nuevo producto -->
            <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" name="marca" required>
              </div>
              <div class="mb-3">
                <label for="tipo">Tipo de lente</label>
                <input type="text" class="form-control" name="tipo" required>
              </div>
              <div class="mb-3">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="categoria">Categoría</label>
                <select class="form-control" name="categoria" required>
                  <option value="">Categorias</option>
                  <?php
                  
                </select>
              </div>
              <div class="mb-3">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" name="precio" required>
              </div>
              <div class="mb-3">
                <label for="imagen">Agregar Imagen</label>
                <input type="file" class="form-control" name="imagen">
              </div>
              <div class="mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" name="stock" required>
              </div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>