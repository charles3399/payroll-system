@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Employee Information</h3>
                <a class="btn btn-primary" href="{{ route('employees.index') }}" role="button"><span>Back to employees</span></a>
            </div>
            <div class="card-body">
                <label><h4>First Name: </h4></label>
                <span style="font-size: 25px">{{ $employee->fname }}</span><br>
                <label><h4>Last Name: </h4></label>
                <span style="font-size: 25px">{{ $employee->lname }}</span><br>
                <label><h4>Gender: </h4></label>
                <span style="font-size: 25px">{{ $employee->gender }}</span><br>
                <label><h4>Address: </h4></label>
                <span style="font-size: 25px">{{ $employee->address }}</span><br>
                <label><h4>Position: </h4></label>
<<<<<<< HEAD
                <span style="font-size: 25px">{{ $employee->positions->name }}</span><br>
                <label><h4>Basic Pay: </h4></label>
                <span style="font-size: 25px">{{ $employee->positions->basic_pay }} (per hour)</span><br>
=======
                <span style="font-size: 25px">{{ $employee->positions->position_name }}</span><br>
                <label><h4>Days Worked: </h4></label>
                <span style="font-size: 25px">{{ $employee->days_work }}</span><br>
                <label><h4>Overtime (hours): </h4></label>
                <span style="font-size: 25px">{{ $employee->overtime_hrs }}</span><br>
                <label><h4>Lates (mins): </h4></label>
                <span style="font-size: 25px">{{ $employee->late }}</span><br>
                <label><h4>Days Absent: </h4></label>
                <span style="font-size: 25px">{{ $employee->absences }}</span><br>
                <label><h4>Bonuses: </h4></label>
                <span style="font-size: 25px">
                    @if ($employee->bonuses == 0)
                        No Bonuses...
                    @else
                        {{ $employee->bonuses }}
                    @endif
                </span><br>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <h3>The Payroll</h3>
            </div>
            <div class="card-body">

>>>>>>> 402c330e9a39320cb2dff43affee2dbeb498d86f
            </div>
        </div>
    </div>
@endsection