<div class="table-responsive">
<table id="table" class="table table-hover table-bordered table-sm border-dark">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th class="text-right" scope="col">Action</th>
    </tr>
    </thead>
    <form id="DepForm">
        <tbody>
        @if(count($departments)>0)
            @foreach($departments as $department)
                <tr id="row{{$department->departmentID}}">
                    <th scope="row">{{$department->departmentID}}</th>
                    <td>{{$department->departmentName}}</td>
                    <td class="text-right">
                        @if($department->departmentID>1)
                            <button class="btn btn-danger" onclick="delDep({{$department->departmentID}})">Delete</button>
                        @else
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Department</button>
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
        <div class="modal-content">
                <div class="p-5 form-group">
                    <label for="DepName">Department Name</label>
                    <input type="text" class="form-control" id="depName" placeholder="Enter Department Name">
                    <small class="form-text text-muted">Write new department name</small>
                </div>
            <button onclick="addDep()" data-toggle="modal" class="btn btn-primary" data-target=".bd-example-modal-lg">Add</button>
        </div>
    </div>
</div>

