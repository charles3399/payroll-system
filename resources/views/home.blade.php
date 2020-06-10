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

                    <a name="" id="" class="btn btn-outline-primary rounded-pill mr-1" href="#" role="button">Create new employee</a>
                    <a name="" id="" class="btn btn-outline-info rounded-pill mr-1" href="#" role="button">Show all employees</a>
                    <a name="" id="" class="btn btn-outline-success rounded-pill" href="#" role="button">Find employees</a>
                    
                    <hr>

                    <div class="container">
                        <div class="card-columns">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h4 class="card-title">Number of Employees</h4>
                                    <h3 class="card-text">10</h3>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body bg-success text-white">
                                    <h4 class="card-title">Total Gross Net Pay</h4>
                                    <h3 class="card-text">₱ 50,000</h3>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body bg-primary text-white">
                                    <h4 class="card-title">Total Positions</h4>
                                    <h3 class="card-text">5</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header"><h3>Another Dashboard</h3></div>
                <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection
