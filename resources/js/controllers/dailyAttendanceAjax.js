window.dailyAttendance = function (){
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url:"/dailyAttendance",
        data:{startDate:startDate,endDate:endDate},
        success:function(result){
            if(result){
                $("#table-container").html(result);
                sortTable();
            }
            else{
                var alertDanger=document.getElementById('alertDanger');
                alertDanger.innerHTML="<span class=\"rounded text-white bg-dark font-weight-bold p-1\">Data</span> has not been found in this interval";
                alertDanger.classList.remove('none');
                setTimeout(function (){
                    alertDanger.classList.add('none');
                },5000);
            }
        },
        error:function(result){
            $("#table-container").html("err");
            console.log('fucking error');
        }
    });
}
