@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Create new Employee</h3>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span>Back to dashboard</span></a>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.store') }}" method="post">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="fname" class="form-control" value="{{ old('fname') }}">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="{{ old('lname') }}">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control" value="{{ old('gender') }}">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    </div>

                    <div class="form-group">
                        <label>Select Position</label>
                        <select class="form-control" name="positions_id">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">
                                    {{ $position->position_name }}
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

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection