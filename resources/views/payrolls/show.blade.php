@extends('layouts.app')

@section('title','Payroll Info')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Payroll Information for: 
                    <strong>
                        {{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}
                    </strong> 
                    ({{date_format($payrolls->created_at, 'Y/m/d h:i a')}})
                </h4>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button">
                    <span>
                        <i class="fas fa-long-arrow-alt-left"></i> Back to Payroll List
                    </span>
                </a>
            </div>
            <div class="card-body">
                <label>
                    <h5>ID: </h5>
                </label>
                <span style="font-size: 20px">{{ $payrolls->id }}</span><br>

                <label>
                    <h5>Employee name: </h5>
                </label>
                <span style="font-size: 20px">
                    {{ $payrolls->employees->pluck('lname')->first() }}, {{ $payrolls->employees->pluck('fname')->first() }}
                </span><br>

                <label>
                    <h5>Position: </h5>
                </label>
                <span style="font-size: 20px">
                    {{ $position_name->pluck('name')->first() }}
                </span><br>

                <label>
                    <h5>Basic Pay: </h5>
                </label>
                <span style="font-size: 20px">
                    ₱{{ number_format($basic_pay->pluck('basic_pay')->first()) }}
                </span><br>

                <label>
                    <h5>Days Worked: </h5>
                </label>
                <span style="font-size: 20px">
                    {{ $payrolls->days_work }}
                </span><br>

                <label>
                    <h5>Overtime (hours): </h5>
                </label>
                <span style="font-size: 20px">
                    {{ $payrolls->overtime_hrs }}
                </span><br>

                <label>
                    <h5>Lates (minutes): </h5>
                </label>
                <span style="font-size: 20px">
                    {{ $payrolls->late }}
                </span><br>

                <label>
                    <h5>Absences: </h5>
                </label>
                <span style="font-size: 20px">
                    {{ $payrolls->absences }}
                </span><br>

                <label>
                    <h5>Bonuses: </h5>
                </label>
                <span style="font-size: 20px">
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

            <div class="card-body">
                <table class="table table-striped table-bordered table-dark text-center mb-3">
                    <thead>
                        <tr>
                            <th>Monthly Pay</th>
                            <th>Overtime Pay</th>
                            <th>Gross Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>₱{{ number_format($monthly) }}</td>
                            <td>₱{{ number_format($overtime) }}</td>
                            <td>₱{{ number_format($gross_income) }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-dark text-center mb-3">
                    <thead>
                        <tr>
                            <th>SSS (Social Security System)</th>
                            <th>HDMF (Home Development Mutual Fund)</th>
                            <th>PhilHealth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>₱{{ number_format($sss) }}</td>
                            <td>₱{{ number_format($hdmf) }}</td>
                            <td>₱{{ number_format($philhealth) }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-dark text-center mb-3">
                    <thead>
                        <tr>
                            <th>Lates</th>
                            <th>Absences</th>
                            <th>Total deduction</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>₱{{ number_format($late_overall) }}</td>
                            <td>₱{{ number_format($absent_overall) }}</td>
                            <td>₱{{ number_format($total_deductions) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card border-dark">
                  <div class="card-body">
                    <h5 class="card-title">Overall Net Pay (Monthly Gross Income - Total deduction)</h5>
                    <h4 class="card-text">Total Pay for {{ $payrolls->employees->pluck('fname')->first() }}: <strong class="font-weight-bold">₱{{ number_format($net_pay) }}</strong></h4>
                  </div>
                </div>
            </div>

        </div>
    </div>
@endsection