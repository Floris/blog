@extends('layouts.landing_page')

@section('content')

    <div class="content">
        <div class="title m-b-md">
            <a href="{{ url('/home') }}"
               style="color:white; text-decoration: none;
               text-shadow: 0 0 30px
               rgba(255, 255, 255, 0.6), 0 0 60px
               rgba(255, 255, 255, 0.45), 0 0 110px
               rgba(255, 255, 255, 0.25), 0 0 100px
               rgba(255, 255, 255, 0.1);
               ">
                Stage Blog van Floris
            </a>
        </div>
        <div style="
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        ">Powered by Laravel and Vue.js
        </div>
    </div>
@endsection