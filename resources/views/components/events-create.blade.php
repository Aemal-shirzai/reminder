<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Add New Events</h4>
        <p class="card-category">Create New Event</p>
    </div>
    <div class="card-body">
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
                    <textarea name="message" id="message" cols="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        {!! Form::submit("Add Event",["class"=>"btn btn-primary"]) !!}
        <div class="clearfix"></div>
        {!! Form::close() !!}
    </div>
</div>