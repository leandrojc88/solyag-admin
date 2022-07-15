const drawTableServiciosSolyag = (serviciosSolyag, total) => {

    const $tablaBody = $('#table-list-servicios-faturar')
    $tablaBody.empty()

    for (const servicio of serviciosSolyag) {

        $tablaBody.append(
            `<tr>
            <td>${servicio.descripcion}</td>
            <td>${servicio.cantidad}</td>
            <td>${servicio.monto}</td>
            <td>${servicio.total}</td>
            </tr>
            `
        )
    }

    $('#txt_total_servicios').html(`Total: ${total} `)
}