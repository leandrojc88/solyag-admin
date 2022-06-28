/**
 * carga el componente `selectCmp <select>` el listado de Status
 * ***siempre se debe incluir el fichero Statys.style.js***
 * @param {*} selectCmp
 */
const loadStatusInSelect = (selectCmp) => {

    selectCmp.find('option').remove()
    selectCmp.prepend('<option value = "0"> -- estado -- </option>');

    for (const item of arrayStatus) {
        selectCmp.append('<option value = "' + item + '">' + item + '</option>')
    }
}