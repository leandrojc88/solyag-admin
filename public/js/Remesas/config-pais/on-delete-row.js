const onDelete = async (typeRowSelected, id) => {

    confirmModal = confirmModalComponent(`Eliminar ${typeRowSelected}`, `¿Seguro que desea eliminar?`);
    const res = await confirmModal.show()

    if (res) {
        loadingModal.show();
        $.ajax({
            type: "post",
            url: `/remesas/config-paises/delete/${typeRowSelected}/${id}`,
            data: { selectedZone: typeRowSelected, id },
            success: function (response) {
                loadingModal.close();
                alertTemplate(`${typeRowSelected} eliminada`);
                removeRow(typeRowSelected, id)
            },
            error: function (e) {
                alertTemplate(e.responseJSON, 'danger');
                loadingModal.close();
            }
        });
    }

}