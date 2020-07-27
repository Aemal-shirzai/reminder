<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Add New Events</h4>
        <p class="card-category">Create New Event</p>
    </div>
    <div class="card-body">
        {!! Form::open(["method"=>"POST","action"=>"EventController@store"]) !!}
        @if(session("eventsAddSuccess"))
            <div class="alert alert-success text-center mt-4 mb-4" style="padding:8px">
                <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session("eventsAddSuccess")}}
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
                    {!! Form::textarea("message",null,["class"=>"form-control summernote",]) !!}
                    @error('message')
                    <span class="invalid-feedback" role="alert" style="display:block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        {!! Form::submit("Add Event",["class"=>"btn btn-primary"]) !!}
        <div class="clearfix"></div>
        {!! Form::close() !!}
    </div>
</div>