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
                <span style="font-size: 25px">{{ $employee->positions->name }}</span><br>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <h3>The Payroll</h3>
            </div>
            <div class="card-body">
                <label><h4>Basic Pay: </h4></label>
                <span style="font-size: 25px">
                    @php
                       $hourly = $employee->positions->basic_pay;
                       $per_day = $hourly * 8;
                       $per_month = $per_day * 26; //continuation
                    @endphp
                    {{$per_month}}
                </span><br>

                <label><h4>Days Worked: </h4></label>
                <span style="font-size: 25px"></span><br>

                <label><h4>Overtime Hours: </h4></label>
                <span style="font-size: 25px"></span><br>

                <label><h4>Lates (min): </h4></label>
                <span style="font-size: 25px"></span><br>

                <label><h4>Absences: </h4></label>
                <span style="font-size: 25px"></span><br>
            </div>
        </div>
    </div>
@endsection