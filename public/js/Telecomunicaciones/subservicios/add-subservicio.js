const onAddSubservicio = async (id_servicio) => {

    $modal_edit = $('#modal__form__id')
    $modal_edit.modal('show');

    form = $('#form_subservicios_post')
    // form.resetForm()
    form.find('#nombre').val('')
    form.find('#productid_dtone').val('')

    form.attr("action", `/telecomunicaciones/post-subservicios`);
    $('#productid_dtone_group').css('display', 'none')

}