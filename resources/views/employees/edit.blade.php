@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Employee</h3>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span>Back to dashboard</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.update', $employee->id) }}"  method="post">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" value="{{ $employee->fname }}{{ old('fname') }}">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="{{ $employee->lname }}{{ old('lname') }}">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control" value="{{ $employee->gender }}{{ old('gender') }}">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $employee->address }}{{ old('address') }}">
                    </div>

                    <div class="form-group">
                        <label>Employee Position</label>
                        <select name="positions_id" class="form-control">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id}}"
                                    
                                    @if (@isset($employee))
                                        @if ($position->id == $employee->positions_id)
                                            selected
                                        @endif
                                    @endif
                                    
                                    >
                                    {{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-outline-success btn-sm" type="submit">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection