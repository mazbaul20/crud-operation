@extends('layout.app')
@section('content')

<div class="container-fluid w-75 mt-3">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Employees</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('employee.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        </div>
                    </div>
                </div>

                <table class="table table-hover" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">
    @foreach ($employees as $employee)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td class="d-flex">
                <a href="{{ route('employee.edit',$employee->id) }}" class="edit"><i class="material-icons"  title="Edit">&#xE254;</i></a>
                <form action="{{ route('employee.destroy',$employee->id) }}" method="post" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>
                </form>
            </td>
        </tr>
    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="" hidden id="deleteID"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    let tableData = $('#tableData');
    tableData.DataTable({
        order:[[0,'asc']],
        lengthMenu:[5,10,15,20]
    });
</script>

<script>
    document.getElementById('confirmDelete').addEventListener('click', function () {
        document.getElementById('deleteForm').submit();
    });

    // $('#confirmDelete').on('click', function () {
    //     $('#deleteForm').submit();
    // });
</script>
@endsection
