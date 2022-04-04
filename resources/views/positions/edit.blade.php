@extends('layouts.app')

@section('title','Edit Position')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Employee</h3>
                <a class="btn btn-primary" href="{{ route('positions.index') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to Positions List</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('positions.update', $positions->id) }}"  method="post">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label>Position Name</label>
                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ $positions->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Basic Pay (per hour)</label>
                        <input type="number" name="basic_pay" class="form-control  @error('basic_pay') is-invalid @enderror" value="{{ $positions->basic_pay }}">
                        @error('basic_pay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-outline-success btn-sm" type="submit">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection