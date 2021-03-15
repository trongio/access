window.getSegment = function (button) {
    $.ajax({
        url: '/' + button,
        type: 'GET',
        success: function success(result) {
            $("#main").html(result);
        }
    });
}
