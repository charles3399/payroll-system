@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Create Payroll</h3>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span>Back to Payroll List</span></a>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="container">
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item text-danger">
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                
                <form action="{{ route('payrolls.store') }}" method="post">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label>Select Employee</label>
                        <select class="form-control" name="employees_id">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->lname }}, {{ $employee->fname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" cols="30" rows="30" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <button class="btn btn-lg btn-primary" type="submit">Create Payroll</button>
                </form>
            </div>
        </div>
    </div>
@endsection