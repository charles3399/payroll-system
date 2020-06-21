@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Employee</h3>
                <a class="btn btn-primary" href="{{ route('employees.index') }}" role="button"><span>Back to Employee List</span></a>
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

                    <div class="form-group">
                        <label>Days Worked</label>
                        <input type="number" name="days_work" class="form-control" value="{{ $employee->days_work }}{{ old('days_work') }}">
                    </div>

                    <div class="form-group">
                        <label>Overtime Hours</label>
                        <input type="number" name="overtime_hrs" class="form-control" value="{{ $employee->overtime_hrs }}{{ old('overtime_hrs') }}">
                    </div>

                    <div class="form-group">
                        <label>Late</label>
                        <input type="number" name="late" class="form-control" value="{{ $employee->late }}{{ old('late') }}">
                    </div>

                    <div class="form-group">
                        <label>Absences</label>
                        <input type="number" name="absences" class="form-control" value="{{ $employee->absences }}{{ old('absences') }}">
                    </div>

                    <div class="form-group">
                        <label>Bonuses - Leave blank if none</label>
                        <input type="number" name="bonuses" class="form-control" value="{{ $employee->bonuses }}{{ old('bonuses') }}">
                    </div>

                    <button class="btn btn-outline-success btn-sm" type="submit">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection