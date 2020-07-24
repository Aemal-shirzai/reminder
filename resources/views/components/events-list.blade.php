<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">List Of EVents</h4>
        <p class="card-category"> Here Is The List Of All Events Registered To System</p>
    </div>
    <div class="card-body">
    @if($events->count() > 0)
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4" id="eventDiv-{{$event->id}}">
                    <div class="card card-profile">
                        <div class="card-body">
                            <h6 class="card-category text-gray">{{ $event->title }} <br><span>{{ $event->date }}</span></h6>
                            <h4 class="card-title">{{ $event->religion->name }}</h4>
                            <p class="card-description">
                               {{ $event->message }}
                            </p>
                            <a href="{{route('events.edit',$event->id)}}" class="btn btn-info" style="padding:8px"><span class="material-icons">edit</span></a>
                            <a href="#" class="btn btn-danger" style="padding:8px" data-toggle="modal" data-target="#EDeleteModal" data-id="{{$event->id}}" 
                                id="eDeleteBtn-{{$event->id}}">
                                <span class="material-icons">delete</span>
                            </a>
                            <hr>
                            @if($event->status == 1)
                                <span class="material-icons text-success" style="font-size: 30px;">check_circle</span>
                            @else
                                <span class="material-icons text-warning" style="font-size: 30px;">pending</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h3 class="text-center p-4 mt-4">
            No Events Registred!
        </h3>
    @endif
    </div>
</div>