<div class="table-responsive">
<table id="table" class="table table-hover table-bordered table-sm">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Shift start</th>
        <th scope="col">Shift end</th>
        <th class="text-right" scope="col">Action</th>
    </tr>
    </thead>
    <form id="DepForm">
        <tbody>
        @if(count($shifts)>0)
            @foreach($shifts as $shift)
                <tr id="row{{$shift->shiftID}}">
                    <th scope="row">{{$shift->shiftID}}</th>
                    <td>{{$shift->shiftName}}</td>
                    <td>{{$shift->shiftStart}}</td>
                    <td>{{$shift->shiftEnd}}</td>
                    <td class="text-right">
                        @if($shift->shiftID>1)
                            <button class="btn btn-danger" onclick="delShift({{$shift->shiftID}})">Delete</button>
                        @else
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add shift</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <h3>No personnel</h3>
        @endif

        </tbody>
    </form>

</table>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="p-5 modal-content">
                <div class="form-group">
                    <label for="DepName">shift Name</label>
                    <input type="text" class="form-control" id="shiftName" placeholder="Enter shift Name">
                    <small class="form-text text-muted">Write new shift name</small>

                    <label for="startTime" class="col-2 col-form-label">Shift start</label>
                    <input class="timepicker form-control" type="time" value="09:00" id="shiftStart">
                    <small class="form-text text-muted">Write shift start</small>

                    <label for="startTime" class="col-2 col-form-label">Shift End</label>
                    <input class="timepicker form-control" type="time" value="18:00" id="shiftEnd">
                    <small class="form-text text-muted">Write shift end</small>

                </div>
            <button onclick="addShift()" data-toggle="modal" class="btn btn-primary" data-target=".bd-example-modal-lg">Add</button>
        </div>
    </div>
</div>

