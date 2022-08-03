const onNewRow = (zoneType) => {

    ensureSelectedPaisForAddProvincia(zoneType)
    ensureSelectedProvinciaForAddMunicipio(zoneType)

    $modal = $('#modal__form__id')
    $modal.modal('show')
    $('#modal__form__label__id').html(`Adicionar ${zoneType}`)

    $form = $('#form_add_row')
    $form.resetForm()
    typeSelected = zoneType;

}


const ensureSelectedPaisForAddProvincia = (zoneType) => {
    if (zoneType == TYPE_PROVINCIA && !paisSelected) {
        alertTemplate("debe seleccionar un Pais", 'danger');
        throw new Error();
    }
}

const ensureSelectedProvinciaForAddMunicipio = (zoneType) => {
    if (zoneType == TYPE_MUNICIPIO && !provinciaSelected) {
        alertTemplate("debe seleccionar una Provincia", 'danger');
        throw new Error();
    }
}

$('#form_add_row').validate({
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
        'nombre': "required"
    },
    messages: {
        'nombre': CONTAB_MSG.REQUIRED_NOT_BLANK
    }
})