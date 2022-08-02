const cmpRow = (config) => {

    const { id, type, name, } = config

    return `
    <div class="row-table d-flex align-items-center" type-row="${type}">
        <div class="mr-auto" style="flex: auto;">
        ${name}
        </div>
        <i class="fa fa-close" onclick="onDelete('${type}', ${id})" ></i>
    </div>
    `
}