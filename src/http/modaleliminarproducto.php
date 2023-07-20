<div class="modal fade" id="modaleliminarproducto" tabindex="-1" aria-labelledby="modaleliminarproducto" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">¿Esta seguro de eliminar este producto?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p style="color: red;">Una vez dando a aceptar no se podrán deshacer los cambios</p>
          </div>
          <div class="modal-footer">
            <form action="../../src/http/eliminarproducto.php" method="post" id="eliminarForm">
                <input type="hidden" name="id" id="id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="eliminar">Aceptar</button>
            </form>
          </div>
        </div>
    </div>
</div>
