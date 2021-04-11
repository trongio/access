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
            $("#table-container").html(result);
            sortTable();
        },
        error:function(result){
            $("#table-container").html("err")
        }
    });
}
