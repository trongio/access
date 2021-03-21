window.getSegment = function (button) {
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
        success: function success(result) {
            $("#table-container").html(result);
            sortTable();
        }
    });
}
