const removeRow = (selectedZone, id) => {
    $(`[id-row="${id}"][type-row="${selectedZone}"]`).remove()
}