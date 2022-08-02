const drawRowsForSelected = (type, rowsConfig) => {
    const selector = $(`[type-card=${type}] .card-text`)
    selector.html("")

    for (const config of rowsConfig) {
        selector.append(cmpRow(config))
    }

    registeListenerOnClick();
}