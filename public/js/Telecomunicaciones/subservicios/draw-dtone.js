const drawDTOneFields = () => {
    $('#productid_dtone_group').css('display', $('#isDTOne').prop('checked') ? 'block' : 'none')
}

$('#isDTOne').change(function (e) {

    drawDTOneFields()

});