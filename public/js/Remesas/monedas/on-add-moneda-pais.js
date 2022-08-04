const onAddMonedaPais = (empresa, pais = null) => {

    $modal = $('#modal__form__id')
    $modal.modal('show')

    $form = $('#form_add_moneda')
    $form.resetForm()

    $empresa = $form.find('#empresa');
    $pais = $form.find('#pais');
    $valor = $form.find('#valor');

    $empresa.val(empresa)
    $pais.val(pais)
    // readonly para los <select>
    if (pais) $pais.css('pointer-events', 'none');
    else $pais.css('pointer-events', 'auto');;
}

$('#form_add_moneda').validate({
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
        'pais': "required",
        'moneda': "required",
        'valor': "required"
    },
    messages: {
        'pais': CONTAB_MSG.REQUIRED_NOT_BLANK,
        'moneda': CONTAB_MSG.REQUIRED_NOT_BLANK,
        'valor': CONTAB_MSG.REQUIRED_NOT_BLANK
    }
})