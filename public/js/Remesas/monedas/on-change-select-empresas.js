$('#select_empresa').change(function () {

    const idEmpresa = $(this).val();
    const params = idEmpresa != 0 ? `?empresa=${idEmpresa}` : '';
    window.location.replace(`/remesas/monedas${params}`);

    // $("#currency option:selected").val()

});