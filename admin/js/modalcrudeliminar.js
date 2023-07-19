let eliminarmodal = document.getElementById('modaleliminarproducto');

eliminarmodal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget;
    let id = button.getAttribute('data-bs-id');
    eliminarmodal.querySelector('.modal-footer #id').value = id;

    let btnAceptar = eliminarmodal.querySelector('.modal-footer button[name="eliminar"]');
    btnAceptar.addEventListener('click', function () {
        document.getElementById('eliminarForm').submit();
    });
});


