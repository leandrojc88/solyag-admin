const onUpdateSubservicio = async (params) => {

    const { id_subservicio, descripcion, isDTOne, productid_dtone } = params;

    $modal_edit = $('#modal__form__id')
    $modal_edit.modal('show');

    const $isDTOneCmp = $('#isDTOne')
    $isDTOneCmp.prop('checked', isDTOne)

    drawDTOneFields()

    form = $('#form_subservicios_post')
    form.attr("action", `/telecomunicaciones/put-subservicios/${id_subservicio}`);
    form.find('#nombre').val(descripcion)
    form.find('#productid_dtone').val(productid_dtone)

}