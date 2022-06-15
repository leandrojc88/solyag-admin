function activarDTone() {

    $.ajax({
        method: 'POST',
        url: "/telecomunicaciones/config/dtone-is-active",
        data: { active: !apiDtoneActive },
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

}