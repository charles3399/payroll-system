@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Create new Employee</h3>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span>Back to dashboard</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('positions.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label>Position Name</label>
                      <input type="text" name="position_name" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Basic pay (per hour)</label>
                        <input type="number" name="basic_pay" class="form-control">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection