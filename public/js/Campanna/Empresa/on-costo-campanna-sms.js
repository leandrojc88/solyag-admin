const onCostoCampannaSms = (id_empresa, costo) => {

    $modal_ = $('#modal-costo-campanna-sms')
    $modal_.modal('show');

    form = $('#form_costo_campanna_sms')

    $empresa = form.find('#id_empresa')
    $costo = form.find('#costo')

    $empresa.val(id_empresa)
    $costo.val(costo)

}

$('#form_costo_campanna_sms').validate({
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