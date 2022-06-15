$('#servicios_nombre').on('keyup', function () {
    var str = $(this).val();
    var matches = str.match(/\b(\w)/g);
    var acronym = matches.join('');
    $('#servicios_abreviatura').val(acronym.toUpperCase())
})