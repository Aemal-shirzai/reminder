@extends('layouts.auth')
@section("title","Reset Password")
@section('content')

<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper mt-5" style="margin: 0 auto;">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Forgot Password</h4>
                        
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(["method"=>"POST","action" => "Auth\ForgotPasswordController@sendResetLinkEmail"]) !!}
                            <div class="form-group mt-4">
                                {!! Form::label("email","E-Mail Address",["class"=>"bmd-label-floating"]) !!}   
                                {!! Form::text("email",null,["class"=>"form-control","id"=>"email"]) !!}
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert" style="display:block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-group">
                                 {!! Form::submit("Send Password Reset Link",["class"=>"btn btn-primary col-12"]) !!}
                            </div>
                        {!! Form::close() !!}
                        <div class="mt-4 text-center text-center">
                            <a href="{{route('login')}}">
                                Login
                            </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



