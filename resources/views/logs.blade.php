<table id="logsTable" class="table table-hover table-bordered table-sm border-dark">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">Name</th>
        <th scope="col">Card №</th>
        <th scope="col">Action</th>
        <th scope="col">Door</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">0</th>
        <td>Giorgi Kakabadze</td>
        <td>987546565</td>
        <td>check in</td>
        <td>9:00</td>
        <td>18:00</td>
    </tr>
    @if(count($personnel)>0)
        @foreach($personnel as $person)
            <tr>
                <th scope="row">{{$person->id}}</th>
                <td>{{$person->name}}</td>
                <td>{{$person->cardNum}}</td>
                <td>{{$person->departmentName}}</td>
                <td>{{$person->shiftStart}}</td>
                <td>{{$person->shiftEnd}}</td>
            </tr>
        @endforeach
    @else
        <h3>No Logs</h3>
    @endif


    </tbody>

</table>



