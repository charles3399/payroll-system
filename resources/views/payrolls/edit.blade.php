@extends('layouts.app')

@section('title','Edit Payroll')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Payroll</h3>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to Payroll List</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('payrolls.update', $payrolls->id) }}"  method="post">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label>Employee</label>
                        <select name="employees_id" class="form-control">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id}}"
                                    
                                    @if (@isset($payrolls))
                                        @if ($employee->id == $payrolls->employees_id)
                                            selected
                                        @endif
                                    @endif
                                    
                                    >
                                    {{ $employee->lname }}, {{ $employee->fname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Days Worked</label>
                        <input type="number" name="days_work" class="form-control @error('days_work') is-invalid @enderror" value="{{ $payrolls->days_work }}{{ old('days_work') }}">
                        @error('days_work')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Overtime Hours</label>
                        <input type="number" name="overtime_hrs" class="form-control @error('overtime_hrs') is-invalid @enderror" value="{{ $payrolls->overtime_hrs }}{{ old('overtime_hrs') }}">
                        @error('overtime_hrs')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Late</label>
                        <input type="number" name="late" class="form-control @error('late') is-invalid @enderror" value="{{ $payrolls->late }}{{ old('late') }}">
                        @error('late')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Absences</label>
                        <input type="number" name="absences" class="form-control @error('absences') is-invalid @enderror" value="{{ $payrolls->absences }}{{ old('absences') }}">
                        @error('absences')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Bonuses - Leave blank if none</label>
                        <input type="number" name="bonuses" class="form-control @error('bonuses') is-invalid @enderror" value="{{ $payrolls->bonuses }}{{ old('bonuses') }}">
                        @error('bonuses')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-outline-success btn-sm" type="submit">Update Payroll</button>

                </form>
            </div>
        </div>
    </div>
@endsection