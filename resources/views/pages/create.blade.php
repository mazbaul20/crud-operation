@extends('layout.app')
@section('content')

<!-- Add Employee -->
<div class="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add Employee</h5>
                <a href="{{ route('employee.index') }}" class="btn btn-success">Back</a>
            </div>
            <form action="{{ route('employee.store') }}" method="post">
                @csrf

                <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Employee Name *</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Employee Email *</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Employee Phone </label>
                                    <input type="text" class="form-control" name="phone">
                                </div>

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
