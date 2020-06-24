@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Payroll</h3>
                <a class="btn btn-primary" href="{{ route('payrolls.index') }}" role="button"><span>Back to Payroll List</span></a>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="container">
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item text-danger">
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('payrolls.update', $payrolls->id) }}"  method="post">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label>Employee</label>
                        <select name="employees_id" class="form-control">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id}}"
                                    
                                    @if (@isset($payrolls))
                                        @if ($employee->id == $payrolls->employees_id)
                                            selected
                                        @endif
                                    @endif
                                    
                                    >
                                    {{ $employee->lname }}, {{ $employee->fname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-cotnrol">
                            {{$payrolls->description}}
                        </textarea>
                    </div>

                    <button class="btn btn-outline-success btn-sm" type="submit">Update Payroll</button>

                </form>
            </div>
        </div>
    </div>
@endsection