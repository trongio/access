window.delDep=function(id){
    var rowid= "#row"+id;
    var ans=confirm("Are you sure you want to delete department "+ id +" ?");
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
            success: function (responce) {
                $(rowid).remove();
                var alertSuccess=document.getElementById('alertSuccess');
                alertSuccess.innerHTML=responce;
                alertSuccess.classList.remove('none');
                setTimeout(function (){
                    alertSuccess.classList.add('none');
                },5000);
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
            if (depName){
                var alertSuccess=document.getElementById('alertSuccess');
                alertSuccess.innerHTML=responce;
                alertSuccess.classList.remove('none');
                setTimeout(function (){
                    alertSuccess.classList.add('none');
                },5000);
                getSegment('departments')
            } else {
                var alertDanger=document.getElementById('alertDanger');
                alertDanger.innerHTML="Department <span class=\"rounded text-white bg-dark font-weight-bold\">Name</span> was empty";
                alertDanger.classList.remove('none');
                setTimeout(function (){
                    alertDanger.classList.add('none');
                },5000);
            }
        },error:function(){
            alert("error!!!!");
        }
    })
}
