@extends('layouts.app')

@section('title','Edit Employee details')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Employee</h3>
                <a class="btn btn-primary" href="{{ route('employees.index') }}" role="button"><span><span><i class="fas fa-long-arrow-alt-left"></i> Back to Employee List</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.update', $employee->id) }}"  method="post">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ $employee->fname }}{{ old('fname') }}">
                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror" value="{{ $employee->lname }}{{ old('lname') }}">
                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ $employee->gender }}{{ old('gender') }}">
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $employee->address }}{{ old('address') }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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