@extends("layouts.main")
@section("title","Colleagues")
@section("pageTitle","Manage Colleagues")
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <x-colleaguesCreate></x-colleaguesCreate>
            </div>
        </div>

        <!-- list -->
        <div class="row">
            <div class="col-md-12">
                <x-colleaguesList></x-colleaguesList>
            </div>
        </div>
    </div>
</div>

@include("../modals.colleagues")
@endsection
    @section("scripts") 
    <script>
        var changeStatusRoute = "{{ route('colleagues.changeStatus') }}"
    </script>
@endsection