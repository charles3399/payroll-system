@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Employee Information</h3>
                <a class="btn btn-primary" href="{{ route('employees.index') }}" role="button"><span>Back to employees</span></a>
            </div>
            <div class="card-body">
                <label>First Name: </label>
                <span>{{ $employee->fname }}</span><br>
                <label>Last Name: </label>
                <span>{{ $employee->lname }}</span><br>
                <label>Gender: </label>
                <span>{{ $employee->gender }}</span><br>
                <label>Address: </label>
                <span>{{ $employee->address }}</span><br>
                <label>Positions ID: </label>
                <span>{{ $employee->positions_id }}</span><br>
            </div>
        </div>
    </div>
@endsection