const onMostrarServicios = () => {
    const $empresa = $('#empresa')
    const $periodo_inicio = $('#periodo_inicio')
    const $periodo_fin = $('#periodo_fin')

    if (!$empresa.val() || !$periodo_fin.val() || !$periodo_inicio.val()) {
        alertTemplate("debe seleccionar la Empresa, y el Periodo de Facturación", "danger")
        return;
    }

    if (new Date($periodo_fin.val()) < new Date($periodo_inicio.val())) {
        alertTemplate("el inicio del Periodo de Facturación deve ser una fecha anterior o igual al fin", "danger")
        return;
    }

    loadingModal.show()
    $.ajax({
        type: "post",
        url: tele_post_servicios_perido_facturacion,
        data: {
            empresa: $empresa.val(),
            periodo_inicio: $periodo_inicio.val(),
            periodo_fin: $periodo_fin.val()
        },
        success: function (response) {
            const { serviciosSolyag, total } = response;
            drawTableServiciosSolyag(serviciosSolyag, total)
            loadingModal.close()

        }
    });

}