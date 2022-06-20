const editarCostoEmpresaCubacel = (params) => {

    const { costo, id_subservicio, id_empresa } = params

    $modal_edit = $('#modal__form__id')
    $modal_edit.modal('show');

    $id_empresa = $('#id_empresa')
    $id_servicio = $('#id_servicio')
    $costo = $('#costo')

    $id_servicio.val(id_subservicio)
    $id_empresa.val(id_empresa)
    $costo.val(costo)

}