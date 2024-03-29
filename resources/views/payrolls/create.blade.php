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
                        <input type="number" name="days_work" class="form-control @error('days_work') is-invalid @enderror" value="{{ old('days_work') }}">
                        @error('days_work')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Overtime (hrs) - Leave 0 if none</label>
                        <input type="number" name="overtime_hrs" class="form-control  @error('overtime_hrs') is-invalid @enderror" value="{{ old('overtime_hrs') }}">
                        @error('overtime_hrs')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Late (mins) - Leave 0 if none</label>
                        <input type="number" name="late" class="form-control  @error('late') is-invalid @enderror" value="{{ old('late') }}">
                        @error('late')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Days Absent - Leave 0 if none</label>
                        <input type="number" name="absences" class="form-control  @error('absences') is-invalid @enderror" value="{{ old('absences') }}">
                        @error('absences')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Bonuses - Leave blank if none</label>
                        <input type="number" name="bonuses" class="form-control @error('bonuses') is-invalid @enderror" value="{{ old('bonuses') }}">
                        @error('bonuses')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-lg btn-primary" type="submit">Create Payroll</button>
                </form>
            </div>
        </div>
    </div>
@endsection