@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="mt-2 mb-2">List of Employees</h3>
                <div>
                    <a class="btn btn-primary mt-2 mb-2" href="{{ route('home') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to dashboard</span></a>
                    <a class="btn btn-success mt-2 mb-2" href="{{ route('employees.create') }}" role="button"><span><i class="fas fa-user-plus"></i> Add New Employee</span></a>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th><center>First Name</center></th>
                            <th><center>Last Name</center></th>
                            <th><center>Gender</center></th>
                            <th><center>Address</center></th>
                            <th><center>Position</center></th>
                            <th><center>Created</center></th>
                            <th><center>Updated</center></th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                        <tbody>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees.index') }}",
                columns: [
                    {data: 'fname', name: 'fname'},
                    {data: 'lname', name: 'lname'},
                    {data: 'gender', name: 'gender'},
                    {data: 'address', name: 'address'},
                    {data: 'positions_id', name: 'positions_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection