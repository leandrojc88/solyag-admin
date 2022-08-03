const submitCreateNewRow = () => {
    $form = $('#form_add_row')
    nombre = $form.find('[name="nombre"]').val();

    let id = null;

    if (typeSelected == TYPE_PROVINCIA) id = paisSelected.id
    if (typeSelected == TYPE_MUNICIPIO) id = provinciaSelected.id

    loadingModal.show();
    $.ajax({
        type: 'post',
        url: `/remesas/config-paises/create/${typeSelected}`,
        data: { nombre, id },
        success: function (response) {
            $form.resetForm();
            drawNewRow(typeSelected, response)
            loadingModal.close();
        },
        error: function (e) {
            alertTemplate(e.responseJSON, 'danger');
            loadingModal.close();
        }
    });
}