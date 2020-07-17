@extends("layouts.main")
@section("title","Edit Colleagues")
@section("pageTitle","Update Colleagues Information")
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Colleague Information</h4>
                        <p class="card-category">Update Data Of Your Colleagues</p>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{route('colleagues.createList')}}" class="btn btn-info"
                                style="padding:8px">Cancel</a>
                            <a href="#" class="btn btn-danger" style="padding:8px" data-toggle="modal"
                                data-target="#CDeleteModal"><span class="material-icons">delete</span></a>
                            <a href="#" class="btn btn-warning" style="padding:8px"><span
                                    class="material-icons">pending</span></a>
                        </div>
                        {!! Form::model($colleague,["method"=>"PUT","action"=>["ColleaguesController@update",$colleague->id]]) !!}
                        @if(session("colleaguesUpdateSuccess"))
                        <div class="alert alert-success text-center mt-4 mb-4" style="padding:8px">
                            <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session("colleaguesUpdateSuccess")}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("full_name","Full Name *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("full_name",null,["class"=>"form-control"]) !!}
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("country","Country Name *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("country",null,["class"=>"form-control"]) !!}
                                    @error('country')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("work_country","Work Country *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("work_country",null,["class"=>"form-control"]) !!}
                                    @error('work_country')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("office_name","Office *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("office_name",null,["class"=>"form-control"]) !!}
                                    @error('office_name')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("position","Position *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("position",null,["class"=>"form-control"]) !!}
                                    @error('position')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("email","email *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("email",null,["class"=>"form-control"]) !!}
                                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("phone1","Telephone",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("phone1",null,["class"=>"form-control"]) !!}
                                    @error('phone1')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("phone2","Cell Phone",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("phone2",null,["class"=>"form-control"]) !!}
                                    @error('phone2')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("phone3","Office Phone",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("phone3",null,["class"=>"form-control"]) !!}
                                    @error('phone3')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("website","Website",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("website",null,["class"=>"form-control"]) !!}
                                    @error('website')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("address","Address",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("address",null,["class"=>"form-control"]) !!}
                                    @error('address')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!!
                                    Form::select("religion_id",$religions,null,["class"=>"form-control"])
                                    !!}
                                    @error('religion_id')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {!! Form::submit("Update Colleague",["class"=>"btn btn-primary"]) !!}
                        <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("../modals.colleagues")
@endsection