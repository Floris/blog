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

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                Blog van Floris
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    {{--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                                @if(Auth::user()->isAdministrator())
                                    <a style="color:red;" class="dropdown-item" href="{{ url('/dashboard') }}">
                                        Dashboard
                                    </a>
                                @endif


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>

            {{--<div class="col-sm-3 col-md-3">--}}
            {{--<form class="navbar-form" role="search">--}}
            {{--<div class="input-group">--}}
            {{--<input type="text" class="form-control" placeholder="Search" name="q">--}}
            {{--<div class="input-group-btn">--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</form>--}}
            {{--</div>--}}

                    <!-- HTML Markup -->
            <div class="col-sm-3 col-md-3">
                <div class="navbar-form aa-input-container" id="aa-input-container" role="search">
                    <div class="input-group">
                        <input type="search" id="aa-search-input" class="form-control aa-input-search"
                               placeholder="zoek op kerntaak bv 1.1"
                               name="search" autocomplete="off"/>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    {{--DISPLAY ERROR--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif

    {{--LOAD CONTENT--}}

    @yield('content')
    {{--@{{ model }}--}}

    <footer class="blog-footer">
        <p>&copy; 2018 - Floris Droppert</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
</script>


<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<!-- Initialize autocomplete menu -->
<script>
    var client = algoliasearch('7ZKK2OFAQ8', '7340ee1903ffd85ffd8a9e35a0e46156');
    var index = client.initIndex('posts');
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input',
            {hint: true}, {
                source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
                //value to be displayed in input control after user's suggestion selection
                displayKey: 'name',
                //hash of templates used when rendering dataset
                templates: {
                    //'suggestion' templating function used to render a single suggestion
                    suggestion: function (suggestion) {
//                        suggestion.objectID

                        return "<a href='/post/"+suggestion.objectID+"'>"
                                + suggestion.title +
                                "</a>";

//                        return "<a href='/post/"+suggestion.objectID+"'>"
//                        + suggestion._highlightResult.title.value +
//                        "</a>";
                    }
                }
            });
</script>
</body>
</html>
