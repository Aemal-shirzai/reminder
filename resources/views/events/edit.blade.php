@extends("layouts.main")
@section("title","Edit Events")
@section("pageTitle","Update Events")
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Update Events</h4>
                        <p class="card-category">Change The Content Of Your Event</p>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{route('events.createList')}}" class="btn btn-info" style="padding:8px">Cancel</a>
                            <a href="#" class="btn btn-danger" style="padding:8px" data-toggle="modal" data-target="#EDeleteModal"><span class="material-icons">delete</span></a>
                        </div>
                        {!! Form::open() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("title","Title For Event",["class"=>"bmd-label-floating"]) !!}
                                        {!! Form::text("title",null,["class"=>"form-control"]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!!
                                        Form::select("relagion_id",[""=>"Relagion","1"=>"Islam","2"=>"Christian"],null,["class"=>"form-control"])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("date","Date",["class"=>"bmd-label-floating"]) !!}
                                        {!! Form::text("date",null,["class"=>"form-control dateP"]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("message","Write Message For Event
                                        *",["class"=>"bmd-label-floating"]) !!}
                                        <textarea name="message" id="message" cols="" rows="5"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            {!! Form::submit("Update Event",["class"=>"btn btn-primary"]) !!}
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("../modals.events")
@endsection

@section("scripts")

    <script>
        flatpickr(".dateP", {});
    
    </script>


@endsection