$('#form_post_facturas_pospago').validate({
    errorClass: 'invalid-label-orange',
    errorPlacement: function (error, element) {
        // colocar mensajes de error a la derecha de cada label para el componente
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
        'empresa': "required",
        'moneda': "required",
        'periodo_inicio': "required",
        'periodo_fin': "required",
    },
    messages: {
        'empresa': "campo requerido!",
        'moneda': "campo requerido!",
        'periodo_inicio': "campo requerido!",
        'periodo_fin': "campo requerido!"
    }
})
