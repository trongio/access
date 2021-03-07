window.getSegment = function (button) {
    alert('working');
    $.ajax({
        url: '/' + button,
        type: 'GET',
        success: function success(result) {
            $("#main").html(result);
        }
    });
}
