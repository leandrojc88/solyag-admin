const drawLoadData = (zoneType, show = false) => {

    display = show ? 'flex' : 'none';
    $(`[type-card=${zoneType}] #load-data-${zoneType}`).css('display', display);
}