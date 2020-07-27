<!DOCTYPE html>
<html>

<head>
    <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet">
</head>

<body>
    <h3>Event Notifications</h3>
    @if($type == "before")
    <p style="word-break: break-all;"> Your <b>{{ $title }} </b> event is about to start in {{ $countDays }} days.</p>
    @else
    <p style="word-break: break-all;"> Your <b>{{ $title }} </b> event just happend.</p>
    @endif
    <hr>

    <div style="background-color: #fbf5f5; padding:15px;     border-radius:13px">
        <h2 style="text-align: center;">Event Content</h2>
        <h4 class="text-center font-weight-bold" id="titleP">{{ $title }}</h4>
        <small class="text-center d-block" id="dateP">{{ $eventDate }}</small>
        <small class="text-center d-block" id="religionP">{{ $religion }}</small>
        <hr>
        <p id="messageP">{!! $content !!}</p>
    </div>


</body>

</html>