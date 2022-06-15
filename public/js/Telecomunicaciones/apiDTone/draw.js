const drawActiveDToneBtn = () => {

    $('#btn_active_dtone').html("<i class='fa fa-check'></i> API DTone activa")

    $('#btn_active_dtone').removeClass('btn-outline-danger');
    $('#btn_active_dtone i').removeClass('fa-close')

    $('#btn_active_dtone').addClass('btn-outline-success')
    $('#btn_active_dtone i').addClass('fa-check')
    $('#btn_active_dtone').addClass('btn-outline-success')

}


const drawDeactiveDToneBtn = () => {

    $('#btn_active_dtone').html("<i class='fa fa-close'></i> API DTone desactiva")

    $('#btn_active_dtone').addClass('btn-outline-danger');
    $('#btn_active_dtone i').addClass('fa-close')

    $('#btn_active_dtone').removeClass('btn-outline-success')
    $('#btn_active_dtone i').removeClass('fa-check')
}