@extends("layouts.main")
@section("title","Edit Profile Information")
@section("pageTitle","Manage User Profile Information")
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Change Name And Email Address</p>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user,["method"=>"PUT","action"=>"ProfileController@update"]) !!}
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label("name","Full Name",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("name",null,["class"=>"form-control"]) !!}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label("email","Email Address",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("email",null,["class"=>"form-control"]) !!}
                                    @error('email')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label("Cpassword","Password For Confirmation",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::password("Cpassword",["class"=>"form-control"]) !!}
                                    @error('Cpassword')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if(session("ProfileEditPasswordNotMatchedError"))
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>{{ session("ProfileEditPasswordNotMatchedError") }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {!! Form::submit("Update Profile",["class"=>"btn btn-primary"]) !!}
                            @if(session("profileEditSuccess"))
                                <div class="alert alert-success text-center" style="padding:8px">
                                    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session("profileEditSuccess") }}
                                </div>
                            @endif
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Change Password</h4>
                        <p class="card-category">Make New Credentials</p>
                    </div>
                    <div class="card-body">
                        {!! Form::open(["method"=>"PUT","action"=>"ProfileController@updatePassword"]) !!}
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label("old_password","Old Password",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::password("old_password",["class"=>"form-control"]) !!}
                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if(session("ChangedPasswordNotMatchedError"))
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>{{ session("ChangedPasswordNotMatchedError") }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {!! Form::label("new_password","New Password",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::password("new_password",["class"=>"form-control"]) !!}
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {!! Form::label("new_password_confirmation","New Password Confirmation",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::password("new_password_confirmation",["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            {!! Form::submit("Change Password",["class"=>"btn btn-primary"]) !!}
                            @if(session("ChangePasswordSuccess"))
                                <div class="alert alert-success text-center" style="padding:8px">
                                    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session("ChangePasswordSuccess") }}
                                </div>
                            @endif
                            
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection