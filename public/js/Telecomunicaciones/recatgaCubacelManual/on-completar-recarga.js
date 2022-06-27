const onCompletarRecarga = (recarga) => {

    $modal_edit = $('#modal__form__id')
    $modal_edit.modal('show');

    const form = $('#form_confirm_recarga')
    form.resetForm();
    form.attr("action", `/telecomunicaciones/recarga-cubacel-manual-done/${recarga}`);
}