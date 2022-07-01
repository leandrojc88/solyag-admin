// init
$empresa = $('#id_empresa');
$servicio = $('#servicio');
$descripcion = $('#descripcion');
$empleado = $('#empleado');
$no_orden = $('#no_orden');
$beneficiario = $('#beneficiario');
$estado = $('#estado');
$start_date = $('#start_date');
$end_date = $('#end_date');

let page = ''

// cargando status
loadStatusInSelect($('#estado'));

const loadQueryParams = () => {

    let queryParams = new URLSearchParams(window.location.search);

    let empresa = queryParams.get("empresa");
    let servicio = queryParams.get("servicio");
    let descripcion = queryParams.get("descripcion");
    let empleado = queryParams.get("empleado");
    let no_orden = queryParams.get("no_orden");
    let beneficiario = queryParams.get("beneficiario");
    let estado = queryParams.get("status");
    let start_date = queryParams.get("start_date");
    let end_date = queryParams.get("end_date");

    if(queryParams.get("page")) page = queryParams.get("page") + '&';

    if(empresa) $empresa.val(empresa)
    if(servicio) $servicio.val(servicio)
    if(descripcion) $descripcion.val(descripcion)
    if(empleado) $empleado.val(empleado)
    if(no_orden) $no_orden.val(no_orden)
    if(beneficiario) $beneficiario.val(beneficiario)
    if(estado) $estado.val(estado)
    if(start_date) $start_date.val(start_date)
    if(end_date) $end_date.val(end_date)
}

loadQueryParams()