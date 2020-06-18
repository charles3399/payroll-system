@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Payroll Information</h3>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span>Back to Payroll List</span></a>
            </div>
            <div class="card-body">
                <label><h4>ID: </h4></label>
                <span style="font-size: 25px">{{ $payrolls->id }}</span><br>
            </div>
        </div>
    </div>
@endsection