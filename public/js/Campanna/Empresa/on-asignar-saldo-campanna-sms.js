const asignarSaldoEmpresa = (params) => {

    const { id, id_empresa, accion } = params

    $modal_edit = $('#modal-saldo-campanna-sms')
    $modal_edit.modal('show');

    let form = $('#form_asignar_saldo_campana_sms');

    $id_empresa = form.find('#id_empresa')
    $accion = form.find('#accion')
    $saldo = form.find('#saldo')
    $label_saldo = form.find('#label_saldo')
    $id_empresa_campanna = $('#id_empresa_campanna')

    $saldo.val('')

    $id_empresa_campanna.val(id)
    $id_empresa.val(id_empresa)
    $accion.val(accion)
    $label_saldo.html(accion + ' Saldo')

}

$('#form_asignar_saldo_campana_sms').validate({
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