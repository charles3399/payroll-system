@extends('layouts.app')

@section('title','Dashboard')

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

                    
                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('employees.create') }}" role="button"><strong><i class="fas fa-user-plus"></i> Create new employee</strong></a>

                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('employees.index') }}" role="button"><strong><i class="fas fa-address-card"></i> Employees List</strong></a>

                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('positions.create') }}" role="button"><strong><i class="fas fa-chalkboard-teacher"></i> Create Position</strong></a>

                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('positions.index') }}" role="button"><strong><i class="far fa-address-book"></i> Position List</strong></a>

                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('payrolls.create') }}" role="button"><strong><i class="fas fa-file-invoice-dollar"></i> Create a Payroll</strong></a>

                    <a class="btn btn-outline-success rounded-pill mr-2 mt-2 mb-2" href="{{ route('payrolls.index') }}" role="button"><strong><i class="fas fa-clipboard-list"></i> Payroll List</strong></a>
                    
                    
                    <hr>

                    <div class="container">
                        
                        <div class="card-columns">
                            <div class="card bg-info">
                                <a href="{{ route('employees.index') }}" style="text-decoration: none"><div class="card-body text-white">
                                    <h4 class="card-title"><i class="fas fa-user-tie"></i> Number of Employees</h4>
                                    <h3 class="card-text">{{ $employees->count() }}</h3>
                                </div></a>
                            </div>
                            <div class="card">
                                <a href="{{ route('payrolls.index') }}" style="text-decoration: none">
                                <div class="card-body bg-success text-white">
                                    <h4 class="card-title"><i class="fas fa-money-check-alt"></i> Total Payrolls</h4>
                                    <h3 class="card-text">{{ $payrolls->count() }}</h3>
                                </div></a>
                            </div>
                            <div class="card bg-primary">
                                <a href="{{ route('positions.index') }}" style="text-decoration: none"><div class="card-body text-white">
                                    <h4 class="card-title"><i class="fas fa-briefcase"></i> Total Positions</h4>
                                    <h3 class="card-text">{{ $positions->count() }}</h3>
                                </div></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
