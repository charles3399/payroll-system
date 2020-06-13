@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>List of Employees</h3>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span>Back to dashboard</span></a>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Position</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($employees as $employee)
                        <tbody>
                            <tr>
                                <td><a href="{{route('employees.show', $employee->id)}}">{{ $employee->fname }}</a></td>
                                <td>{{ $employee->lname }}</td>
                                <td>{{ $employee->gender }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->positions->name }}</td>
                                <td><a href="{{route('employees.edit', $employee->id)}}"><button class="btn btn-sm btn-outline-primary">Edit</button></a></td>
                                <td>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection