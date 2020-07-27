<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>
        @yield("title")
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- date picker css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white"
            data-image="{{asset('images/sidebar-1.jpg')}}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Reminder
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item  {{ (Route::currentRouteName() == 'profile.edit' ? 'active' : '') }}">
                        <a class="nav-link" href="{{route('profile.edit')}}">
                            <i class="material-icons">person</i>
                            <p>Manage Profile</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Route::currentRouteName() == 'colleagues.createList' ||
                                            Route::currentRouteName() == 'colleagues.edit') active  @endif">
                        <a class="nav-link" href="{{ route('colleagues.createList') }}">
                            <i class="material-icons">people_alt</i>
                            <p>Manage Colleagues</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Route::currentRouteName() == 'events.createList' ||
                                            Route::currentRouteName() == 'events.edit') active  @endif">
                        <a class="nav-link" href="{{route('events.createList')}}">
                            <i class="material-icons">events</i>
                            <p>Manage Events</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                            <i class="material-icons">exit_to_app</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">@yield('pageTitle')</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <i class="material-icons" style="font-size: 15px;">chevron_right</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('logout')}}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Log
                                        out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    {!! Form::open(["method"=>"POST","action"=>"Auth\LoginController@logout","id"=>"logout-form"]) !!}
                    {!! Form::close() !!}
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">

                @yield("content")

            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="{{asset('js/core/jquery.min.js')}}"></script>
        <script src="{{asset('js/core/popper.min.js')}}"></script>
        <script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
        <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>

        <!-- date picker script -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- others -->
        <script src="{{asset('js/material-dashboard.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/extra.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/custom.js')}}" type="text/javascript"></script>

        <!-- summernote editor -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script>
        var token = "{{ Session::token() }}"
        var changeStatusRoute = "{{ route('colleagues.changeStatus') }}"
        var colleaguesDeleteRoute = "{{ route('colleagues.delete') }}"
        var colleaguesSearch = "{{ route('colleagues.search') }}"
        var eventsDeleteRoute = "{{ route('events.delete') }}"
        </script>
        <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Message',
                height: 300,
                fontSizeUnits: ['px'],

                codemirror: {
                    theme: 'cerulean'
                },
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    // ['font', ['strikethrough', 'superscript', 'subscript']],
                    // ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    // ['color', ['color']],
                    // ['fontname', ['fontname']],
                    // ['table', ['table']],
                    ['insert', ['link', 'hr']],
                    // ['view', ['fullscreen', 'help']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                callbacks: {
                    onPaste: function(e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window
                            .clipboardData).getData('text/html');
                        e.preventDefault();
                        var div = $('<div />');
                        div.append(bufferText);
                        div.find('*').removeAttr('style');
                        setTimeout(function() {
                            document.execCommand('insertHtml', false, div.html());
                        }, 1);
                    }
                },

            });
        });
        </script>
        @yield("scripts")
</body>

</html>