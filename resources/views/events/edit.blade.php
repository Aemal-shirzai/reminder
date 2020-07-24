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
                            <a href="{{route('events.createList')}}" class="btn btn-info" style="padding:8px">Back</a>
                        </div>
                        {!! Form::model($event,["method"=>"PUT","action"=>["EventController@update",$event->id]]) !!}
                        @if(session("eventsUpdateSuccess"))
                        <div class="alert alert-success text-center mt-4 mb-4" style="padding:8px">
                            <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session("eventsUpdateSuccess")}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label("title","Title For Event",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("title",null,["class"=>"form-control"]) !!}
                                    @error('title')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::select("religion_id",$religions,null,["class"=>"form-control"]) !!}
                                    @error('religion_id')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label("date","Date",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::text("date",null,["class"=>"form-control dateP"]) !!}
                                    @error('date')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label("message","Write Message For Event
                                    *",["class"=>"bmd-label-floating"]) !!}
                                    {!! Form::textarea("message",null,["class"=>"form-control","rows"=>"5"]) !!}
                                    @error('message')
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
flatpickr(".dateP", {
    disableMobile:true,
    enableTime:true,
    // time_24hr:true,
    defaultHour:0,
    enableSeconds:true
}); 
</script>


@endsection