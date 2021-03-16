<table id="table" class="table table-hover table-bordered table-sm border-dark">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">Name</th>
        <th scope="col">Card №</th>
        <th scope="col">Action</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
    </tr>
    </thead>
    <tbody>
{{--    l.logID, p.PersonName, p.cardNum, a.actionName, l.time, l.date--}}
    @if(count($logs)>0)
        @foreach($logs as $log)
            <tr>
                <th scope="row">{{$log->logID}}</th>
                <td>{{$log->PersonName}}</td>
                <td>{{$log->cardNum}}</td>
                <td>{{$log->actionName}}</td>
                <td>{{$log->time}}</td>
                <td>{{$log->date}}</td>
            </tr>
        @endforeach
    @else
        <h3>No Logs</h3>
    @endif


    </tbody>

</table>



