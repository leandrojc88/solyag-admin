
function execDTone() {

    $.ajax({
        method: "POST",
        data: {},
        url: 'dtone/looptask',
        dataType: 'json',
        success: function (data) {
            console.log('ok')
        },

        error: function (err) {
            console.log('err', err)
        }
    });

}
