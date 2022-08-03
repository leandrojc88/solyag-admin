const drawNewRow = (type, rowsConfig) => {
    const selector = $(`[type-card=${type}] .card-text`)

    selector.append(cmpRow(rowsConfig))

    registeListenerOnClick();
}