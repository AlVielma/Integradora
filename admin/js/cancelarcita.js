let cancelarcita = document.getElementById('modaleliminarcita');

cancelarcita.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget;
    let id = button.getAttribute('data-bs-id');
    cancelarcita.querySelector('.modal-footer #id').value = id;

    let btnAceptar = cancelarcita.querySelector('.modal-footer button[name="cancelar"]');
    btnAceptar.addEventListener('click', function () {
        document.getElementById('eliminarcita').submit();
    });
});
