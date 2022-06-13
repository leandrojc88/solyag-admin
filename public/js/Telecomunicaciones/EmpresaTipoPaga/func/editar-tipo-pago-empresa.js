const editarTipoEmpresa = (params) => {

    const { tipo, saldo, id, name, id_empresa } = params

    $modal_edit = $('#modal__form__id')
    $modal_edit.modal('show');

    $id_empresa = $('#id_empresa')
    $id_empresa_t_pago = $('#id_tipo_pago_empresa')
    $saldo = $('#saldo')
    $tipo = $('#tipo')

    $id_empresa_t_pago.val(id)
    $id_empresa.val(id_empresa)
    $saldo.val(saldo)
    $tipo.prop('checked', isPospago(tipo))

    drawTextFieldValor()

}

const isPospago = (tipo) => tipo == POSPAGO