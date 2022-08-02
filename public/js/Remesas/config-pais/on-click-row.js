const onClickRow = async (typeRowSelected) => {
    let result;
    await $.ajax({
        type: "post",
        url: `/remesas/config-paises/get-config-by-selected/${typeRowSelected}`,
        data: "data",
        success: function (response) {
            console.log(response);

            result = { id: '55', name: 'nuevo comp', type: typeRowSelected }
        }
    });

    return result;

}


$('.row-table div').click(async function (e) {

    $(this).parent().addClass('row-selected');
    $(this).parent().siblings().removeClass('row-selected');

    const typeRow = $(this).parent().attr('type-row');

    const cofing = await onClickRow(typeRow)
    console.log(cofing);
    $(this).parent().parent().append(cmpRow(cofing));
});