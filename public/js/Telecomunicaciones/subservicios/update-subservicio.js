const onUpdateSubservicio = async (params) => {

    const { id_subservicio, descripcion, productid_dtone, valor } = params;

    $modal_edit = $('#modal__form__id')
    $modal_edit.modal('show');

    form = $('#form_subservicios_post')
    form.attr("action", `/telecomunicaciones/put-subservicios/${id_subservicio}`);
    form.find('#nombre').val(descripcion)
    form.find('#productid_dtone').val(productid_dtone)
    form.find('#valor').val(valor)
    // form.
    // form.submit()
    // if (res) {
    //     submitForm(`telecomunicaciones/put-subservicios/${id_subservicio}`,
    //         [
    //             { name: 'id_servicio', value: id_servicio }
    //         ])
    // }
}