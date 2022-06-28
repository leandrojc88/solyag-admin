$('#id_empresa').on('change', function () {

    window.location.replace(`/telecomunicaciones/recarga-cubacel-manual/${$(this).val()}`);

});