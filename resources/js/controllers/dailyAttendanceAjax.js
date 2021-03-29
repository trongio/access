window.dailyAttendance = function (){
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;
    console.log({startDate,endDate});
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url:"/dailyAttendance",
        dataType: 'json',
        data:{startDate:startDate,endDate:endDate},
        success:function(data){
            console.log(data);
        },
        error:function (data){
            console.log(data);
        }
    });
}
