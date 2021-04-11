<div class="pt-3 d-inline-flex">
    <div class="form-group d-inline-flex">

        <label for="startTime" class="col col-form-label">Start</label>
        <input class="form-control" type="date"
               value="{{Carbon\Carbon::now()->format('Y-m-d')}}"
               id="startDate">

        <label for="endDate" class="col col-form-label">End</label>
        <input  class="form-control" type="date"
                value="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                id="endDate">

        <button onclick="dailyAttendance()" data-toggle="modal" class="col-3 ml-4 btn btn-primary" data-target=".bd-example-modal-lg">Get Attendance</button>

    </div>
</div>

<table id="table" class="table table-hover table-bordered table-sm">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Person Name</th>
            <th scope="col">Work (hr)</th>
            <th scope="col">Overtime (hr)</th>
        </tr>
    </thead>
    <tbody>
{{--    l.personID, l.date, l.time, l.actionID--}}
    @if(count($dailyAttendance)>0)

        @foreach($dailyAttendance as $Attendance)
            <tr>
                <th scope="row">{{$Attendance->personID}}</th>
                <td>{{$Attendance->date}}</td>
                <td>{{$Attendance->personName}}</td>
                <td>{{$Attendance->workedTime}}</td>
                <td>{{$Attendance->overtime}}</td>
            </tr>
        @endforeach
    @else
        <h3>No personnel</h3>
    @endif
    </tbody>

</table>

