@extends('layouts.app')

@section('title','Position List')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Positions</h3>
                <div>
                    <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to dashboard</span></a>
                    <a class="btn btn-success" href="{{ route('positions.create') }}" role="button"><span><i class="fas fa-file-invoice-dollar"></i> Create New Position</span></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Position name</th>
                            <th>Basic pay</th>
                            <th>Actions</th>
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
                ajax: "{{ route('positions.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'basic_pay', name: 'basic_pay'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection