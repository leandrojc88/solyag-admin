const onClickRow = async (typeRowSelected) => {
    let result;
    const id = getZoneSelected(typeRowSelected).id
    typeHerarchy = getZoneChildrenHerarchy(typeRowSelected)
    await $.ajax({
        type: "post",
        url: `/remesas/config-paises/get-config-by-selected/${typeHerarchy}`,
        data: { id },
        success: function (response) {
            result = response;
        }
    });

    return result;

}

registeListenerOnClick = () => {

    $('.row-table div').click(async function (e) {

        $(this).parent().addClass('row-selected');
        $(this).parent().siblings().removeClass('row-selected');

        const typeRow = $(this).parent().attr('type-row');
        const itemRow = JSON.parse($(this).parent().attr('item-row'));

        cleareChildrenHerarchy(typeRow)
        setZoneSelected(typeRow, itemRow);

        const cofing = await onClickRow(typeRow)

        drawRowsForSelected(getZoneChildrenHerarchy(typeRow), cofing);
    });
}

registeListenerOnClick();