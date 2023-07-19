<!-- Modal -->
<?php
require __DIR__ . '/../../vendor/autoload.php';
use App\Modelos\productos;
$productos = new productos();
$categorias = $productos->mostrar_categorias();
$tipolente = $productos->mostrar_tipo_lentes();
$marca = $productos->mostrar_marca();
?>

<div class="modal fade" id="modalproducto" tabindex="-1" aria-labelledby="modalproudcto" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <!-- Formulario para agregar un nuevo producto -->
            <form action="../../src/http/guardarproducto.php" method="post" enctype="multipart/form-data" >
              <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="marca">Marca</label>
                <select class="form-control" name="marca" required>
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
                <select class="form-control" name="tipo_lente" required>
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
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="categoria">Categoría</label>
                <select class="form-control" name="categoria" required>
                 <option value="">Categorías</option>
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
              <button type="submit" class="btn btn-primary" name="agregar">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>