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
            if (responce["shiftName"]===null || responce["shiftStart"] >= responce["shiftEnd"]){
                var alertDanger=document.getElementById('alertDanger');
                if (responce["shiftName"]===null) {
                    alertDanger.innerHTML = "Shift <span class=\"rounded text-white bg-dark font-weight-bold\">Name</span> was empty"
                } else{
                    alertDanger.innerHTML = "Shift <span class=\"rounded text-white bg-dark font-weight-bold\">Start</span> cannot be after the <span class=\"rounded text-white bg-dark font-weight-bold\">End</span>"
                }
                alertDanger.classList.remove('none');
                setTimeout(function (){
                    alertDanger.classList.add('none');
                },7500);
            } else {
                var alertSuccess=document.getElementById('alertSuccess');
                alertSuccess.innerHTML=responce;
                alertSuccess.classList.remove('none');
                setTimeout(function (){
                    alertSuccess.classList.add('none');
                },7500);
                getSegment('shifts');
            }
        },error:function(){
            alert("error!!!!");
        }
    })
}
