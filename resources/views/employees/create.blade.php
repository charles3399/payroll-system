@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Create new Employee</h3>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span>Back to dashboard</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="fname" id="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" id="gender" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Position id</label>
                        <input type="text" name="positions_id" id="positions_id" class="form-control">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection