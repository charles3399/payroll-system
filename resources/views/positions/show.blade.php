@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Position Information</h3>
                <a class="btn btn-primary" href="{{ route('positions.index') }}" role="button"><span>Back to List of Positions</span></a>
            </div>
            <div class="card-body">
                <label>Position Name: </label>
                <span>{{ $position->name }}</span><br>
                <label>Basic Pay: </label>
                <span>₱{{ $position->basic_pay }} per hour</span><br>
            </div>
        </div>
    </div>
@endsection