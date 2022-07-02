const asignarSaldoEmpresa = (params) => {

    const { id, id_empresa, accion } = params

    $modal_edit = $('#modal__form__id')
    $modal_edit.modal('show');

    $id_empresa = $('#id_empresa')
    $accion = $('#accion')
    $label_saldo = $('#label_saldo')
    $id_empresa_t_pago = $('#id_tipo_pago_empresa')
    $('#saldo').val('')

    $id_empresa_t_pago.val(id)
    $id_empresa.val(id_empresa)
    $accion.val(accion)
    $label_saldo.html(accion + ' Saldo')

}