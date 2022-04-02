@extends('layouts.app')

@section('title','Change Password')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            Change Password
            <a class="btn btn-sm btn-primary float-right" href="{{ route('users.profile') }}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to my profile</a>
        </div>
        <div class="card-body">
            <form action="{{ route('users.password-update') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">

                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection