@extends('layouts.auth')
@section("title","Reset Password")
@section('content')
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper mt-5" style="margin: 0 auto;">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Reset Password</h4>
                        {!! Form::open(["method"=>"post","action"=>"Auth\ResetPasswordController@reset"]) !!}
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group mt-4">
                                {!! Form::label("email","E-Mail Address",["class"=>"bmd-label-floating"]) !!}
                                {!! Form::text("email",null,["class"=>"form-control"])!!}
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label("password","Password",["class"=>"bmd-label-floating"]) !!}
                                {!! Form::password("password",["class"=>"form-control"]) !!}
                                <div class="form-text text-muted">
                                    <small>Make sure your password is strong and easy to remember</small>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label("password-confirm","Confirm Password",["class"=>"bmd-label-floating"]) !!}
                                {!! Form::password("password_confirmation",["class"=>"form-control"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit("Reset Password",["class"=>"btn btn-primary col-12"]) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection