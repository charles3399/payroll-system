@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Payroll</h3>
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
                        <input type="number" name="days_work" class="form-control" value="{{ $payrolls->days_work }}{{ old('days_work')}}">
                    </div>

                    <div class="form-group">
                        <label>Overtime (hours)</label>
                        <input type="number" name="overtime_hrs" class="form-control" value="{{ $payrolls->overtime_hrs }}{{ old('overtime_hrs') }}">
                    </div>

                    <div class="form-group">
                        <label>Number of lates (Leave 0 if none)</label>
                        <input type="number" name="late" class="form-control" value="{{ $payrolls->late }}{{ old('late') }}">
                    </div>

                    <div class="form-group">
                        <label>Number of absences (Leave 0 if none)</label>
                        <input type="number" name="absences" class="form-control" value="{{ $payrolls->absences }}{{ old('late') }}">
                    </div>

                    <div class="form-group">
                        <label>Bonuses (Leave blank if not applicable)</label>
                        <input type="number" name="bonuses" class="form-control" value="{{ $payrolls->bonuses }}{{ old('bonuses') }}">
                    </div>

                    <button class="btn btn-outline-success btn-sm" type="submit">Update Payroll</button>

                </form>
            </div>
        </div>
    </div>
@endsection