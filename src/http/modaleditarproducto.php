<?php
require __DIR__ . '/../../vendor/autoload.php';
use App\Modelos\productos;
$productos = new productos();
$categorias = $productos->mostrar_categorias();
$tipolente = $productos->mostrar_tipo_lentes();
$marca = $productos->mostrar_marca();
?>

<div class="modal fade" id="modaleditarproducto" tabindex="-1" aria-labelledby="modaleditarproudcto" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form action="actualizar_producto.php" method="POST">
            <input type="hidden" id="product_id" name="product_id" value="">
              <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="marca">Marca</label>
                <select class="form-control" name="marca" id="marca" required>
                  <option value="">Marcas</option>
                  <?php
                  foreach ($marca as $marc) {
                  ?>
                      <option value="<?php echo $marc['id']; ?>">
                          <?php echo $marc['nombre']; ?>
                      </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="tipo">Tipo de lente</label>
                <select class="form-control" name="tipo_lente" id="tipo_lente" required>
                  <option value="">Tipo de lentes</option>
                  <?php
                  foreach ($tipolente as $tlente) {
                  ?>
                      <option value="<?php echo $tlente['id']; ?>">
                          <?php echo $tlente['tipo_lente']; ?>
                      </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="categoria">Categoría</label>
                <select class="form-control" id="categoria" name="categoria" required>
                  <?php
                  foreach ($categorias as $cat) {
                  ?>
                      <option value="<?php echo $cat['id']; ?>">
                          <?php echo $cat['nombre']; ?>
                      </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <!-- Agrega los demás campos del formulario de edición según tus necesidades -->
              <div class="mb-3">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
              </div>
              <div class="mb-3">
                <label for="imagen">Agregar Imagen</label>
                <input type="file" class="form-control" name="imagen">
              </div>
              <div class="mb-3">
                <label for="stock">Cantidad</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
              </div>
            
           
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
          </div>

        </div>
      </div>
    </div>