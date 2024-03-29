@extends('layouts.app')

@section('title','Payroll Masterlist')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="mt-2 mb-2">Payroll List</h3>
                <div>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to dashboard</span></a>
                <a class="btn btn-success mr-1" href="{{ route('payrolls.create') }}" role="button"><span><i class="fas fa-file-invoice-dollar"></i> Create New Payroll</span></a>
                
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>Payroll ID</th>
                            <th>Employee Name</th>
                            <th>Payroll Created</th>
                            <th>Payroll Updated</th>
                            <th>Action</th>
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
                ajax: "{{ route('payrolls.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'employees_id', name: 'employees_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection