/**
 * Asigna un objetao a la variable de seleccion
 * dependiendo del listado de zone que sea seleccionado
 */
setZoneSelected = (zoneType, obj) => {
    switch (zoneType) {
        case TYPE_PAIS:
            paisSelected = obj
            break;

        case TYPE_PROVINCIA:
            provinciaSelected = obj
            break;

        case TYPE_MUNICIPIO:
            municipioSelected = obj
            break;

        default: // reset
            paisSelected = null;
            provinciaSelected = null;
            municipioSelected = null;

    }
}