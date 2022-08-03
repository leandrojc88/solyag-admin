const TYPE_PAIS = 'pais';
const TYPE_PROVINCIA = 'provincia';
const TYPE_MUNICIPIO = 'municipio';
const TYPE_LOCACION = 'locacion';
const TYPES = [TYPE_PAIS, TYPE_PROVINCIA, TYPE_MUNICIPIO];

let paisSelected = null;
let provinciaSelected = null;
let municipioSelected = null;
let typeSelected = TYPE_PAIS;

getZoneChildrenHerarchy = (zone) => {
    if (zone == TYPE_PAIS) return TYPE_PROVINCIA;
    if (zone == TYPE_PROVINCIA) return TYPE_MUNICIPIO;
    if (zone == TYPE_MUNICIPIO) return false;
    // if(zone == TYPE_MUNICIPIO) return TYPE_LOCACION;
}
