@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Payroll Information for: <strong>{{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}</strong></h4>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span>Back to Payroll List</span></a>
            </div>
            <div class="card-body">
<<<<<<< HEAD
                <label><h4>ID: </h4></label>
                <span style="font-size: 25px">{{ $payrolls->id }}</span><br>
                <label><h4>Employee name: </h4></label>
                <span style="font-size: 25px">
                    {{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}
                </span><br>
                <label><h4>Position: </h4></label>
                <span style="font-size: 25px">
                    {{ $payrolls->employees->pluck('positions_id')->first() }}
                </span><br>
                <label><h4>Days Worked: </h4></label>
                <span style="font-size: 25px">{{ $payrolls->days_work }}</span><br>
                <label><h4>Overtime (hours): </h4></label>
                <span style="font-size: 25px">{{ $payrolls->overtime_hrs }}</span><br>
                <label><h4>Lates (minutes): </h4></label>
                <span style="font-size: 25px">{{ $payrolls->late }}</span><br>
                <label><h4>Absences: </h4></label>
                <span style="font-size: 25px">{{ $payrolls->absences }}</span><br>
                <label><h4>Bonuses: </h4></label>
                <span style="font-size: 25px">
                    @if ($payrolls->bonuses == 0)
                        No bonus..
                    @else
                        {{ $payrolls->bonuses }}
                    @endif
                </span><br>
=======
                <label><h4>Payroll ID:</h4></label>
                <span style="font-size: 25px" class="ml-1">{{ $payrolls->id }}</span><br>

                <label><h4>Employee Name:</h4></label>
                <span style="font-size: 25px" class="ml-1"> {{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}</span><br>

                <label><h4>Payroll Brief Description:</h4></label>
                <span style="font-size: 25px" class="ml-1">{{ $payrolls->description }}</span><br>
>>>>>>> 402c330e9a39320cb2dff43affee2dbeb498d86f
            </div>
        </div>
    </div>
@endsection