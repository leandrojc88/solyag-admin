const onCompletarRecarga = (params) =>
    submitForm(`/telecomunicaciones/recarga-cubacel-manual-done/${params.id_empresa}/${params.recarga}`)