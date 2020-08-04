@extends('layouts.app')

@section('title',$users->name)

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            My Profile

            <a class="btn btn-sm btn-primary float-right" href="{{ route('home') }}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to dashboard</a>

        </div>
    
        <div class="card-body">
    
            <h3>{{$users->name}}</h3>
    
            <hr>
    
            <a class="btn btn-outline-warning" href="{{ route('users.change-password') }}" role="button" style="color: black">Change password</a>
    
        </div>
    </div>
</div>
@endsection
