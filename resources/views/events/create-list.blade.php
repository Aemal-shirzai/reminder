@extends("layouts.main")
@section("title","Events")
@section("pageTitle","Manage Events")
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <x-eventsCreate></x-eventsCreate>
            </div>
        </div>

        <!-- list -->
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <x-eventsList></x-eventsList>
            </div>
        </div>
    </div>
</div>

@include("../modals.events")
@endsection

@section("scripts")

<script>
flatpickr(".dateP", {
    disableMobile: true,
    enableTime: true,
    // time_24hr:true,
    defaultHour: 0,
    enableSeconds: true
});
</script>
s

@endsection