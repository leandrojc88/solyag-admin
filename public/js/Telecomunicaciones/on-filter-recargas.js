
const onFilterRecargas = () => {

    let params = [];

    // const cmpFilters = $('.filter-select')
    const cmpFilters = [
        $empresa,
        $descripcion,
        $empleado,
        $no_orden,
        $beneficiario,
        $estado,
        $start_date,
        $end_date
    ]

    for (const comp of cmpFilters) {
        if (comp.val() && comp.val() != 0) {
            params.push({ [comp.attr('name')]: comp.val() })
        }
    }

    queryParams = params.map(e => Object.keys(e)[0] + '=' + e[Object.keys(e)[0]]).join('&');

    window.location.replace(`/telecomunicaciones?${queryParams}`);

}


const onClearFilterRecargas = () => {

    window.location.replace(`/telecomunicaciones`);
}