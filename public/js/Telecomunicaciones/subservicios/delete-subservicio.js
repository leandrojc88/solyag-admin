const onDeleteSubservicio = async (id_servicio, id_subservicio) => {


    confirmModal = confirmModalComponent('Eliminar Subservicio ', `El subservicio será eliminado. ¿Deseas continuar?`)

    const res = await confirmModal.show()

    if (res) {
        submitForm(`/telecomunicaciones/delete-subservicios/${id_subservicio}`,
            [
                { name: 'id_servicio', value: id_servicio }
            ])
    }
}