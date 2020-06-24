@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Position Information</h3>
                <a class="btn btn-primary" href="{{ route('positions.index') }}" role="button"><span>Back to List of Positions</span></a>
            </div>
            <div class="card-body">
                <label><h4>Position Name: </h4></label>
                <span style="font-size: 25px">{{ $positions->name }}</span><br>
                <label><h4>Basic Pay: </h4></label>
                <span style="font-size: 25px">₱{{ $positions->basic_pay }} per hour</span><br>
                <label><h4>Number of employees assigned for this position: </h4></label>
                <span style="font-size: 25px">{{$positions->employees->count()}}</span><br>
            </div>
        </div>
    </div>
@endsection