

const confirmModalComponent = (
    titel = `<i class="fa fa-trash text-light"></i> Eliminar...`,
    body = '¿ Seguro que desea eliminar ?'
) => {

    const confirmModalTag = $('#confirm__modal');
    const titleTag = $('#confirm__modal__title');
    const bodyTag = $('#confirm__modal__body');

    const formTag = $('#form__confirm__modal');
    const tokenTag = $('#_token__confirm__modal');
    const pageNameTag = $('#page__confirm__modal');

    const btnOkTag = $('#confirm__modal__btn_ok');
    const btnCancelTag = $('#confirm__modal__btn_cancel');

    const hide = () => confirmModalTag.modal('hide');


    const show = () => new Promise(resolve => {

        titleTag.html(titel);
        bodyTag.html(body);

        btnOkTag.on('click', () => {
            hide()
            resolve(true)
        })
        btnCancelTag.on('click', () =>{
            hide()
            resolve(false)
        })

        confirmModalTag.modal('show')

    })

    return {
        show,
        hide
    }


}