const onCostoLargaDistancia = (id_empresa, costo) => {

    $modal_edit = $('#modal-costo-larga-distancia')
    $modal_edit.modal('show');

    form = $('#form_costo_larga_distancia')

    $empresa = form.find('#id_empresa')
    $costo = form.find('#costo')

    $empresa.val(id_empresa)
    $costo.val(costo)

}

$('#form_costo_larga_distancia').validate({
    errorClass: 'invalid-label-orange',
    errorPlacement: function (error, element) {
        const error_label = element.closest("form").find(element.attr('id') + "-error")
        if (error_label.length) {
            error_label.removeClass('hide')
        } else {
            error.addClass('ml-3')
            $(element)
                .closest("form")
                .find("label[for='" + element.attr("id") + "']")
                .append(error);
        }
    },
    rules: {
        'costo': "required"
    },
    messages: {
        'costo': CONTAB_MSG.REQUIRED_NOT_BLANK
    }
})