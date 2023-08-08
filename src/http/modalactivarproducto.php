<div class="modal fade" id="modalactivarproducto" tabindex="-1" aria-labelledby="modalactivarproducto" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">¿Esta seguro de habilitar este producto?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p style="color: black;">Se habilitara el producto una vez dando aceptar</p>
          </div>
          <div class="modal-footer">
            <form action="../../src/http/activarproducto.php" method="post" id="activarForm">
                <input type="hidden" name="id" id="id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="activar">Aceptar</button>
            </form>
          </div>
        </div>
    </div>
</div>