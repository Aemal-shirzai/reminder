@extends('layouts.auth')
@section("title","Login")
@section('content')

<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper mt-4" style="margin: 0 auto;">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Login To System</h4>
                        @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                        <div class="alert text-danger  text-center messages mb-3">
                            {{ $error }}
                        </div>
                        @endforeach
                        @endif
                        {!! Form::open(["method"=>"post","action"=>"Auth\LoginController@login"]) !!}
                        <div class="form-group mt-4">
                            {!! Form::label("email","E-Mail Address",["class"=>"bmd-label-floating"]) !!}
                            {!! Form::text("email",null,["class"=>"form-control"])
                            !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("password","Password",["class"=>"bmd-label-floating"]) !!}
                            {!! Form::password("password",["class"=>"form-control"]) !!}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                {!! Form::checkbox("remember",null,null,["class"=>"form-check-input"])!!}
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                    
                                </span>
                                Remember Me
                            </label>
                        </div>

                        <div class="form-group">
                            {!! Form::submit("Login",["class"=>"btn btn-primary col-12"]) !!}
                        </div>
                        <div class="mt-4 text-center text-center">
                            <a href="{{route('password.request')}}">
                                Forgot Password?
                            </a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection