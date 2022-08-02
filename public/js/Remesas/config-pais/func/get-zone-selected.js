/**
 * obtine objetao a la variable de seleccion
 * dependiendo del listado de zone que sea seleccionado
 */
getZoneSelected = (zoneType) => {
    switch (zoneType) {
        case TYPE_PAIS:
            return paisSelected

        case TYPE_PROVINCIA:
            return provinciaSelected;

        case TYPE_MUNICIPIO:
            return municipioSelected

        default: // reset
            return null;
    }
}