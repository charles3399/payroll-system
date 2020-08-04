@extends('layouts.app')

@section('title','Payroll Info')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h4>Payroll Information for: <strong>{{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}</strong> ({{date_format($payrolls->created_at, 'Y/m/d h:i a')}})</h4>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span><i class="fas fa-long-arrow-alt-left"></i> Back to Payroll List</span></a>
            </div>
            <div class="card-body">
                <label><h4>ID: </h4></label>
                <span style="font-size: 25px">{{ $payrolls->id }}</span><br>

                <label><h4>Employee name: </h4></label>
                <span style="font-size: 25px">
                    {{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}
                </span><br>

                <label><h4>Position: </h4></label>
                <span style="font-size: 25px">
                    {{ $position_name->pluck('name')->first() }}
                </span><br>

                <label><h4>Basic Pay: </h4></label>
                <span style="font-size: 25px">
                    ₱{{ number_format($basic_pay->pluck('basic_pay')->first()) }}
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
            </div>
        </div>

        <div class="card shadow mt-3 mb-3">

            <div class="card-header">
                <h4>Payroll</h4>
            </div>

            @php
                //Earnings
                $hourly = $basic_pay->pluck('basic_pay')->first();
                $monthly = $hourly * 8 * $payrolls->days_work;
                $overtime = (($hourly * 0.5) + $hourly ) * $payrolls->overtime_hrs;
                $gross_income = $monthly + $overtime;
                //Deductions
                $per_day = $hourly * 8;
                $late = $payrolls->late;
                $absent = $payrolls->absences;
                $late_perpay = $hourly / 60;
                $late_overall = $late_perpay * $late;
                $absent_overall = $hourly * 8 * $absent;
                $sss = round($monthly * 0.011);
                $hdmf = round($monthly * 0.002);
                $philhealth = round($monthly * 0.0275);
                //Net Pay
                $total_deductions = $sss + $hdmf + $philhealth + $late_overall + $absent_overall;
                $net_pay = $gross_income - $total_deductions;
            @endphp

            <div class="card-body">
                <label><h3>Earnings</h3></label>
                <h4 class="card-title mt-2 mb-5">Monthly Pay: ₱{{ number_format($monthly) }}</h4>
                <h4 class="card-title mt-2 mb-5">Overtime Pay: ₱{{ number_format($overtime) }}</h4>
                <h4 class="card-title mt-2 mb-5">Gross Income: ₱{{ number_format($gross_income) }}</h4>

                <label><h3>Deductions with monthly contributions</h3></label>
                <h4 class="card-title mt-2 mb-5">SSS (Social Security System): ₱{{ number_format($sss) }}</h4>
                <h4 class="card-title mt-2 mb-5">HDMF (Home Development Mutual Fund): ₱{{ number_format($hdmf) }}</h4>
                <h4 class="card-title mt-2 mb-5">PhilHealth: ₱{{ number_format($philhealth) }}</h4>
                <h4 class="card-title mt-2 mb-5">Lates: ₱{{ number_format($late_overall) }}</h4>
                <h4 class="card-title mt-2 mb-5">Absences: ₱{{ number_format($absent_overall) }}</h4>
                <h4 class="card-title mt-2 mb-5">Total Deduction: ₱{{ number_format($total_deductions) }}</h4>

                <label><h3>Overall Net Pay (Monthly Gross Income - Total deduction)</h3></label>
                <h4 class="card-title mt-2 mb-5">Total Pay for {{ $payrolls->employees->pluck('fname')->first() }}: <strong>₱{{ number_format($net_pay) }}</strong></h4>
            </div>

        </div>
    </div>
@endsection