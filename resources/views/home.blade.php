@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col xl-12">
            <div class="card">
                <div class="card-header justify-content-between"><h3>Dashboard</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('employees.create') }}" role="button">Create new employee</a>
                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('employees.index') }}" role="button">Employees List</a>
                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('positions.create') }}" role="button">Create Position</a>
                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('positions.index') }}" role="button">Position List</a>
                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('payrolls.create') }}" role="button">Create a Payroll</a>
                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('payrolls.index') }}" role="button">Payroll List</a>
                    
                    
                    <hr>

                    <div class="container">
                        <div class="card-columns">
                            <div class="card bg-info">
                                <a href="{{ route('employees.index') }}" style="text-decoration: none"><div class="card-body text-white">
                                    <h4 class="card-title">Number of Employees</h4>
                                    <h3 class="card-text">{{ $employees->count() }}</h3>
                                </div></a>
                            </div>
                            <div class="card">
                                <div class="card-body bg-success text-white">
                                    <h4 class="card-title">Total Gross Net Pay</h4>
                                    <h3 class="card-text">₱ 50,000</h3>
                                </div>
                            </div>
                            <div class="card bg-primary">
                                <a href="{{ route('positions.index') }}" style="text-decoration: none"><div class="card-body text-white">
                                    <h4 class="card-title">Total Positions</h4>
                                    <h3 class="card-text">{{ $positions->count() }}</h3>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header"><h3>Another Dashboard</h3></div>
                <div class="card-body">
                    <h2>Useless piece of shit dashboard</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
