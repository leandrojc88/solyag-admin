$('#form_confirm_recarga').validate({
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
        'numero_confirmacion': "required"
    },
    messages: {
        'numero_confirmacion': CONTAB_MSG.REQUIRED_NOT_BLANK
    }
})
