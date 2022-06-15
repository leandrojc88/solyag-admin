function activarDTone() {

    // $.ajax({
    //     method: "POST",
    //     data: { active: !apiDtoneActive },
    //     url: '/dtone-active-is-actives',
    //     dataType: 'json',
    //     success: function (data) {
    //         if (data.full_loading) {
    //             resolve(true)
    //         }
    //         resolve(false)
    //     },
    //     error: function (err) {
    //         console.log(err);
    //         alertTemplate('Error interno al modificar la BD', 'danger')
    //         loadingModal.close();
    //     }
    // });


    $.ajax({
        method: 'POST',
        url: "/dtone-active-is-actives",
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