@extends('layouts.app')

@section('title','Create Position')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Create new Employee</h3>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to dashboard</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('positions.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label>Position Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Basic pay (per hour)</label>
                        <input type="number" name="basic_pay" class="form-control @error('basic_pay') is-invalid @enderror" value="{{ old('basic_pay') }}">
                        @error('basic_pay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection