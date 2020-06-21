@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Payroll Information for: <strong>{{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}</strong></h4>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span>Back to Payroll List</span></a>
            </div>
            <div class="card-body">
                <label><h4>Payroll ID:</h4></label>
                <span style="font-size: 25px" class="ml-1">{{ $payrolls->id }}</span><br>

                <label><h4>Employee Name:</h4></label>
                <span style="font-size: 25px" class="ml-1"> {{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}</span><br>

                <label><h4>Payroll Brief Description:</h4></label>
                <span style="font-size: 25px" class="ml-1">{{ $payrolls->description }}</span><br>
            </div>
        </div>
    </div>
@endsection