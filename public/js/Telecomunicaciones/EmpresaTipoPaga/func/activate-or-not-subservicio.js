const onActivateOrNotSubservicio = (id, activo) => {

    submitForm(`/telecomunicaciones/empresa-active-or-cancel-subservicio-cubacel`, [
        { name: "id", value: id },
        { name: "activo", value: !activo }
    ])
}
