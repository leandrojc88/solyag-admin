let apiDtoneActive;

$.ajax({
    type: 'GET',
    url: "/telecomunicaciones/config/load-is-active",
    dataType: 'json',
    success: function (response) {
        console.log(response);

        apiDtoneActive = response.active

        if (response.active) {
            drawActiveDToneBtn()
        } else
            drawDeactiveDToneBtn()
    }
});
