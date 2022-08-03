const cmpRow = (config) => {

    const { id, type, nombre, } = config

    return `
    <div class="row-table d-flex align-items-center" id-row="${id}"  item-row='{"id": "${id}", "nombre": "${nombre}", "type": "${type}" }' type-row="${type}">
        <div class="mr-auto" style="flex: auto;">
        ${nombre}
        </div>
        <i class="fa fa-close" onclick="onDelete('${type}', ${id})" ></i>
    </div>
    `;

}