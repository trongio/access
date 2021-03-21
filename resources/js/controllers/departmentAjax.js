window.delDep=function(id){
    var rowid= "#row"+id;
    var ans=confirm("Are you sure you want to delete "+ rowid + "department?");
    if (ans) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/delDep",
            dataType: 'json',
            data: {delID: id},
            success: function (result) {
                $(rowid).remove();
                alert(result)
            }, error: function () {
                alert("error!!!!");
            }
        })
    }
}

window.addDep=function(){
    var depName= document.getElementById("depName").value;
    console.log(depName);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        url: "/addDep",
        dataType: 'json',
        data:{depName:depName},
        success: function (responce){
            getSegment('departments')
            console.log(responce)
        },error:function(){
            alert("error!!!!");
        }
    })
}
