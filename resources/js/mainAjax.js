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
        }
    });
}

window.DelDep=function(id){
    var rowid= "#row"+id;
    console.log(rowid);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        url: "/DelDeps",
        dataType: 'json',
        data:{DelID:id},
        success: function (result){
            $(rowid).remove();
            alert(result)
        },error:function(){
            alert("error!!!!");
        }
    })
}
