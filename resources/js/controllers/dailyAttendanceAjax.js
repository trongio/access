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
        dataType: 'json',
        data:{startDate:startDate,endDate:endDate},
        success:function(data){
            console.log({startDate,endDate});
            console.log({'Success': {data}});
            console.log(Object.keys(data).length);
            var result = '';
            var length = Object.keys(data).length;
            if (Object.keys(data).length > 0) {
                for(var i = 0; i < length; i++){
                    result +=
                        '<tr>'+
                            '<th scope="row">'+data[i].date+'</th>'+
                            '<td>'+data[i].personName+'</td>'+
                            '<td>'+data[i].workedTime+'</td>'+
                            '<td>'+data[i].overtime+'</td>'+
                        '</tr>';
                }
            }
            else {
                result = '<h3>No personnel</h3>'
            }
            $('tbody').html(result);

        },
        error:function (data){
            console.log('Error' ,{data});
        }
    });
}
