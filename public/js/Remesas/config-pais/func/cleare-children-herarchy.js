const cleareChildrenHerarchy = (typeRow) => {
    if (typeRow == TYPE_PAIS) {
        const selector = $(`[type-card=${TYPE_PROVINCIA}] .card-text , [type-card=${TYPE_MUNICIPIO}] .card-text`)
        selector.html("")
    };
    if (typeRow == TYPE_PROVINCIA) {
        const selector = $(`[type-card=${TYPE_MUNICIPIO}] .card-text`)
        selector.html("")
    } if (typeRow == TYPE_MUNICIPIO) return false;
    // if(typeRow == TYPE_MUNICIPIO) return TYPE_LOCACION;
}