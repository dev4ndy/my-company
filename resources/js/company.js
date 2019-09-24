function onInit(event) {
    modalListen();
}

/**
 * Change the action when you open a confirm modal.
 */
function modalListen() {
    $('#modal-confirm-delete').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        $('#modal-form-delete').attr('action', `/${button.data('entity')}/${button.data('entity-id')}`);
    });
}

/**
 * Load all after the page load
 */
document.addEventListener('DOMContentLoaded', onInit);
