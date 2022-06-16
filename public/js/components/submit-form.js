
/**
 * envia un formulario creado temporalmente a una url del backend
 *
 * @param path action del envio del formulario `/url/para-enviar-form`
 *
 * @param data array de objetos con el nombre y valor de los input del formulario
 * [{ name: string, value: mixed }, ... ]
 */
const submitForm = (path, data = []) => {

    $('body').append(`
        <form action='${path}' method="post" id='form_submit_form'>
            ${data.map(v => `<input hidden name='${v.name}' value='${v.value}'/>`).join(' ')}
        </form>`)

    const fomrulario = $('#form_submit_form')
    fomrulario.submit()
    // fomrulario.remove()
}