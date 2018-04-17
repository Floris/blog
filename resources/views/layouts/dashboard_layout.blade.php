<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog van Floris</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark "  style="font-size: 13px;">
    <a class="col-sm-3 col-md-2 dash-menu1" href="{{ url('/home ') }}"><i class="fa fa-tachometer" aria-hidden="true"></i>
        Blog van Floris</a>
    {{--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            {{--<a class="nav-link" style="color:red;" href="/home">Logout</a>--}}

            <a class="nav-item text-nowrap" style="color:#dd1144;" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
        </li>


    </ul>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/dashboard') }}">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/posts') }}">
                            <span data-feather="file"></span>
                            Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/drafts') }}">
                            <span data-feather="file"></span>
                            Drafts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/create') }}">
                            <span data-feather="shopping-cart"></span>
                            Create New Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="text-decoration: line-through;">
                            <span data-feather="shopping-cart"></span>
                            Tags
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/comments') }}">
                            <span data-feather="shopping-cart"></span>
                            Comments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/users') }}">
                            <span data-feather="shopping-cart"></span>
                            Users
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('form')
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/summernote.js') }}"></script>
{{--<script>--}}
    {{--$(document).ready(function() {--}}
        {{--$('#summernote').summernote();--}}
    {{--});--}}
{{--</script>--}}

<script>

    $(document).ready(function() {
        $('#summernote').summernote({
            height: 650,
//            popover: {
//                image: [],
//                link: [],
//                air: []
//            }
        });
    });

//$.ajaxSetup({
//    headers: {
//        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//    }
//});

//$(document).ready(function(){
//
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        }
//    });
//
//    $('#summernote').summernote({
//        height: 650,
//
//        onImageUpload: function(files, editor, welEditable) {
//            sendFile(files[0], editor, welEditable);
//        }
//    });
//    function sendFile(file, editor, welEditable) {
//        var  data = new FormData();
//        data.append("file", file);
//        var url = '/dashboard/create';
//        $.ajax({
//            data: data,
//            type: "POST",
//            url: url,
//            cache: false,
//            contentType: false,
//            processData: false,
//            success: function(url) {
//                alert('Success');
//                editor.insertImage(welEditable, url);
//            }
//        });
//    }
//});


</script>
</body>
</html>
