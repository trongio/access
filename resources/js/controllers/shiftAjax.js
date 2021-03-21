window.delShift=function(id){
    var rowid= "#row"+id;
    var ans=confirm("Are you sure you want to delete shift "+ id +" ?");
    if (ans) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/delShift",
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

                alert(result)
            }, error: function () {
                alert("error!!!!");
            }
        })
    }
}

window.addShift=function(){
    var shiftName= document.getElementById("shiftName").value;
    var shiftStart= document.getElementById("shiftStart").value;
    var shiftEnd= document.getElementById("shiftEnd").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        url: "/addShift",
        dataType: 'json',
        data:{shiftName,shiftStart,shiftEnd},
        success: function (responce){
            if (responce["shiftName"]===null){
                var alertDanger=document.getElementById('alertDanger');
                alertDanger.innerHTML="Shift Name was empty";
                alertDanger.classList.remove('none');
                setTimeout(function (){
                    alertDanger.classList.add('none');
                },5000);
            } else {
                var alertSuccess=document.getElementById('alertSuccess');
                alertSuccess.innerHTML=responce;
                alertSuccess.classList.remove('none');
                setTimeout(function (){
                    alertSuccess.classList.add('none');
                },5000);
                getSegment('shifts');
            }
        },error:function(){
            alert("error!!!!");
        }
    })
}
