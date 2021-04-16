window.getSegment = function (button,data=null) {
    $.ajax({
        url: '/loading',
        type: 'GET',
        success: function success(result) {
            $("#table-container").html(result);
        }
    });

    $.ajax({
        url: '/' + button,
        type: 'GET',
        data:data,
        success: function success(result) {
            $("#table-container").html(result);
            sortTable();
        }
    });
    $('.sidenav a').attr('class', '');
    $('#' + button).attr('class', 'btn_checked');
}
