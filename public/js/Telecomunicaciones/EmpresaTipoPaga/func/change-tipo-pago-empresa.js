const changeTipoPagoEmpresa = (idEmpresa) => {

    const tipo = $(`#toggle-${idEmpresa}`).prop('checked');
    const $laodData = $(`#load-data-${idEmpresa}`);

    $laodData.show();

    $.ajax({
        type: "POST",
        url: `/update-tipo-pago-empresa/${idEmpresa}`,
        data: { tipo },
        success: function (response) {
            $laodData.hide();

            $(`#btn-asignar-saldo-${idEmpresa}`).css('display', response ? 'block' : 'none')
            $(`#btn-view-history-${idEmpresa}`).css('display', response ? 'block' : 'none')

            $(`#txt-saldo-${idEmpresa}`).css('display', response ? 'block' : 'none')
            $(`#txt-saldo-${idEmpresa}`).css('color', 'white')
            $(`#txt-saldo-${idEmpresa}`).css('padding-top', '8px')
        }
    });
}

const isPrepago = (tipo) => tipo == PREPAGO