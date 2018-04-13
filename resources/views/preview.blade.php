@extends('layouts.dashboard_layout')

@section('content')
    @foreach($preview as $key => $value)
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Preview Post</h1>
            {{--<form action="{{ url('/dashboard/post/'.$value->id).'/delete' }}" method="post">--}}
            {{--<input type="text" name="id" value="{{$value->id}}" style="display: none;">--}}
            {{--@csrf--}}
            {{--<input type="submit" value="delete">--}}
            {{--</form>--}}
            <a href="/dashboard/post/{{$value->id}}">Edit</a>
        </div>
            <div class="container" style="margin-top: 15px; margin-bottom: 50px;">
                <div class="row justify-content-center post">
                    <div class="col-md-10">
                        <h2>{{$value->title}}</h2>
                        {{--<p>{{ date_format($value->created_at, 'j F, Y g:ia' )}}</p>--}}
                        <div class="content">
                            {!! $value->post_content !!}
                        </div>
                        <p>{{ date_format($value->created_at, 'j F, Y g:ia' )}}</p>
                        <p>Kerntaken: {{ str_replace(",",", ",$value->tags) }}</p>
                    </div>
                </div>
            </div>
            </main>
    @endforeach
@endsection
