@extends('layouts.dashboard_layout')

@section('form')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New Post</h1>
        </div>

        <form action="{{url()->full()}}" method="POST">

            <div class="form-group">
                <input type="text" class="form-control" id="exampleFormControlInput1"
                       placeholder="Title" name="title">
            </div>

            <div class="form-group">
                {{--<div id="summernote"><p>Hello Summernote</p></div>--}}
                <textarea id="summernote" name="post_content"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Tags:</label>
                @foreach($tags as $key=> $tag)

                <div class="checkbox">
                    <label><input type="checkbox" value="{{$tag->name}}" name="tags[]">{{$tag->name}}</label>
                </div>

                @endforeach
            </div>

            <div class="form-group">
                @csrf

                <div class="checkbox">
                        <label><input type="checkbox" value="1" name="draft" checked> Draft</label>
                </div>

                <input type="submit" value="Submit">



            </div>

        </form>
    </main>
@endsection