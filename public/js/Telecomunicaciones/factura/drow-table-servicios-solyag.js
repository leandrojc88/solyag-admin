const drawTableServiciosSolyag = (serviciosSolyag, total) => {

    const $tablaBody = $('#table-list-servicios-faturar')
    $tablaBody.empty()

    $('#txt_total_servicios').html(`Total: ${total} `)

    if (total == 0) {
        $tablaBody.append(
            `<tr>
                <td> el periodo ya esta facturado </td>
            </tr>
            `
        )
        return;
    }

    for (const servicio of serviciosSolyag) {

        $tablaBody.append(
            `<tr>
            <td >${servicio.descripcion}</td>
            <td class="text-center">${servicio.cantidad}</td>
            <td class="text-right">${servicio.monto}</td>
            <td class="text-right">${servicio.total}</td>
            </tr>
            `
        )
    }

}