@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Employee</h3>
                <a class="btn btn-primary" href="{{ route('positions.index') }}" role="button"><span>Back to Positions List</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('positions.update', $positions->id) }}"  method="post">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label>Position Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $positions->name }}">
                    </div>

                    <div class="form-group">
                        <label>Basic Pay (per hour)</label>
                        <input type="number" name="basic_pay" class="form-control" value="{{ $positions->basic_pay }}">
                    </div>

                    <button class="btn btn-outline-success btn-sm" type="submit">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection