const onCompletarDtone = () => {

    $modal_edit = $('#modal-recarga-manual-dtone')
    $modal_edit.modal('show');

    const form = $('#form_confirm_dtone')
    form.resetForm();
    // form.attr("action", `/telecomunicaciones/recargas-cubacel-manual-to-dtone`);
}