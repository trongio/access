window.getSegment = function (button) {
    $.ajax({
        url: '/' + button,
        type: 'GET',
        success: function success(result) {
            $("#table-container").html(result);
        }
    });
}
