@extends("layouts.main")
@section("title","Colleagues")
@section("pageTitle","Manage Colleagues")
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add New Colleagues</h4>
                        <p class="card-category">Create New Record For Your Colleagues</p>
                    </div>
                    <div class="card-body">
                        {!! Form::open() !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("full_name","Full Name *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("full_name",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("country","Country Name *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("country",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("work_country","Work Country *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("work_country",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("office_name","Office *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("office_name",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("position","Position *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("position",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("email","email *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("email",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("phone1","Telephone",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("phone1",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("phone2","Cell Phone",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("phone2",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("phone3","Office Phone",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("phone3",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("website","Website",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("website",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label("address","Address",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("address",null,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!!
                                    Form::select("relagion_id",[""=>"Relagion","1"=>"Islam","2"=>"Christian"],null,["class"=>"form-control"])
                                    !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::submit("Add Colleague",["class"=>"btn btn-primary"]) !!}
                        <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- list -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Colleagues</h4>
                        <p class="card-category"> Here Is The List Of All Colleagues Registered To System</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Office</th>
                                    <th>Position</th>
                                    <th>Religion</th>
                                    <th>Actions</th>
                                    <th>More</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Ahmad Zaki</td>
                                        <td>Afghanistan</td>
                                        <td>Ministry Of Education</td>
                                        <td>Program Officer</td>
                                        <td>Islam</td>
                                        <td>
                                            <a href="{{route('colleagues.edit',1)}}" class="btn btn-info" style="padding:8px"><span class="material-icons">edit</span></a>
                                            <a href="#" class="btn btn-danger" style="padding:8px" data-toggle="modal" data-target="#CDeleteModal"><span class="material-icons">delete</span></a>
                                            <a href="#" class="btn btn-success" style="padding:8px"><span class="material-icons">check_circle</span></a>
                                        </td>
                                        <td><a href="#" data-toggle="modal" data-target="#CFullInfoModal">Full Info</a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Ahmad Zaki</td>
                                        <td>Afghanistan</td>
                                        <td>Ministry Of Education</td>
                                        <td>Program Officer</td>
                                        <td>Islam</td>
                                        <td>
                                            <a href="{{route('colleagues.edit',1)}}" class="btn btn-info" style="padding:8px"><span class="material-icons">edit</span></a>
                                            <a href="#" class="btn btn-danger" style="padding:8px" data-toggle="modal" data-target="#CDeleteModal"><span class="material-icons">delete</span></a>
                                            <a href="#" class="btn btn-warning" style="padding:8px"><span class="material-icons">pending</span></a>
                                        </td>
                                        <td><a href="#" data-toggle="modal" data-target="#CFullInfoModal">Full Info</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("../modals.colleagues")
@endsection