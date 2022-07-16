const submitFactura = () => {

    validateForm.form();
    if (validateForm.errorList.length === 0) {

        $form_post_facturas_pospago = $('#form_post_facturas_pospago')
        loadingModal.show()

        $.ajax({
            type: "post",
            url: tele_post_facturas_pospago,
            data: $form_post_facturas_pospago.serialize(),
            success: function (response) {
                loadingModal.close()
                window.open(`/telecomunicaciones/factura/print-facturas-pospago/${response.idfactura}`, "_blank")
                window.location.replace(tele_get_facturas_pospago);

            },
            error: (e) => loadingModal.close()
        });
    }
}