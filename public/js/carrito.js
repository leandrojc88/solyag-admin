$.ajax({
    type: 'POST',
    data: {'code': '200'},
    url: window.location.protocol + "//" + location.hostname + ":" + window.location.port + "/home/moneda/menu",
    dataType: 'json',
    success: function (data) {

        if (data)
            for (let i = 0; i < data.length; i++) {

                if (data[i].estatus) {
                    $("#monedaSys").text(data[i].nombre);
                    $('#currency').prepend("<option selected value='" + data[i].code + "' >" + data[i].nombre + "</option>");
                } else {
                    $('#currency').prepend("<option  value='" + data[i].code + "' >" + data[i].nombre + "</option>");
                }

            }
        else{
            $('#currency').prepend("<option  value='-1' disabled selected> Sin Monedas</option>");
        }

    }
});

$.ajax({
    type: 'POST',
    data: {'code': '200'},
    url: window.location.protocol + "//" + location.hostname + ":" + window.location.port + "/home/atender/",
    dataType: 'json',
    success: function (data) {

        let atender = document.getElementById('icon-notification');
        atender.setAttribute('data-count', data);


    }
});

$("#currency").change(function () {
    if ($('#rows_solicitudes_remesas').find('tr').length > 0)
        $('#ModalConfirmChange').modal('show')
    else {
        $.ajax({
            type: 'POST',
            data: {'code': '200'},
            url: window.location.protocol + "//" + location.hostname + ":" + window.location.port + "/home/moneda/select/" + $("#currency option:selected").val(),
            dataType: 'json',
            success: function (data) {
                window.location.href = window.location.pathname;

            }
        });
    }

});

$('#btn_aceptar_change').on('click', function () {
    $.ajax({
        type: 'POST',
        data: {'code': '200'},
        url: window.location.protocol + "//" + location.hostname + ":" + window.location.port + "/home/moneda/select/" + $("#currency option:selected").val(),
        dataType: 'json',
        success: function (data) {
            window.location.href = window.location.pathname;

        }
    });
})

let previous;
$('#btn_salir_change').on('click', function () {
    $("#currency").val(previous)
})


function remesaEditar(id) {
    window.location.href = "/remesas.json.editar/" + id;
}