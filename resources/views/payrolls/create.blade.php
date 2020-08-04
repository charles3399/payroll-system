@extends('layouts.app')

@section('title','Create Payroll')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Create Payroll</h3>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to Payroll List</span></a>
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
                        <label>Days Worked</label>
                        <input type="number" name="days_work" class="form-control" value="{{ old('days_work') }}">
                    </div>

                    <div class="form-group">
                        <label>Overtime (hrs) - Leave 0 if none</label>
                        <input type="number" name="overtime_hrs" class="form-control" value="{{ old('overtime_hrs') }}">
                    </div>

                    <div class="form-group">
                        <label>Late (mins) - Leave 0 if none</label>
                        <input type="number" name="late" class="form-control" value="{{ old('late') }}">
                    </div>

                    <div class="form-group">
                        <label>Days Absent - Leave 0 if none</label>
                        <input type="number" name="absences" class="form-control" value="{{ old('absences') }}">
                    </div>

                    <div class="form-group">
                        <label>Bonuses - Leave blank if none</label>
                        <input type="number" name="bonuses" class="form-control" value="{{ old('bonuses') }}">
                    </div>

                    <button class="btn btn-lg btn-primary" type="submit">Create Payroll</button>
                </form>
            </div>
        </div>
    </div>
@endsection