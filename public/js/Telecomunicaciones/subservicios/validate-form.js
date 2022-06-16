
$('#form_subservicios_post').validate({
    rules: {
        'nombre': "required"
    },
    messages: {
        'nombre': ""
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
        $(element).popover({ content: 'valor requerido!', placement: 'bottom', trigger: 'manual' }).popover('show').on('shown.bs.popover', function () {
            $('#subservicios_nombre-error').hide()
            setTimeout(function (time) {
                $(element).popover('hide').removeClass('is-invalid')
            }, 3000)
        })
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
    }
})
