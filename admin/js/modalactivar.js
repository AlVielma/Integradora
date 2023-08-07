let activarproducto = document.getElementById('modalactivarproducto');

activarproducto.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget;
    let id = button.getAttribute('data-bs-id');
    activarproducto.querySelector('.modal-footer #id').value = id;

    let btnAceptar = activarproducto.querySelector('.modal-footer button[name="activar"]');
    btnAceptar.addEventListener('click', function () {
        document.getElementById('activarForm').submit();
    });
});