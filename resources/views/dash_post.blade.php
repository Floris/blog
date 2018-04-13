@extends('layouts.dashboard_layout')

@section('content')
        @foreach($post as $key => $value)

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Edit Post</h1>
                        {{--<form action="{{ url('/dashboard/post/'.$value->id).'/delete' }}" method="post">--}}
                            {{--<input type="text" name="id" value="{{$value->id}}" style="display: none;">--}}
                            {{--@csrf--}}
                            {{--<input type="submit" value="delete">--}}
                        {{--</form>--}}
                        <a href="/preview/{{$value->id}}">Preview</a>
                    </div>


                    <form action="{{url()->full()}}/update" method="POST">
{{--                        <p>{{ date_format($value->created_at, 'j F, Y g:ia' )}} </p>--}}
                        <?php echo "<p>Published on: ".date('j F, Y g:ia', strtotime($value->created_at))."</p>";  ?>
                        <?php echo "<p>Edited on: ".date('j F, Y g:ia', strtotime($value->updated_at))."</p>";  ?>

                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Title" name="title" value="{{$value->title}}">
                        </div>

                        <div class="form-group">
                            {{--<div id="summernote"><p>Hello Summernote</p></div>--}}
                            <textarea id="summernote" name="post_content">{{ $value->post_content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tags:</label>

                            @foreach($tags as $key=> $tag)
                                <div class="checkbox">
                                 @if( strpos($value->tags, $tag->name) !== false)
                                        <label><input type="checkbox" value="{{$tag->name}}" name="tags[]" checked>{{$tag->name}}</label>
                                @else
                                        <label><input type="checkbox" value="{{$tag->name}}" name="tags[]">{{$tag->name}}</label>
                                @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            @csrf
                            <div class="checkbox">
                                @if($value->draft == 1)
                                <label><input type="checkbox" value="1" name="draft" checked> Draft</label>
                                    @else
                                    <label><input type="checkbox" value="1" name="draft"> Draft</label>
                                @endif
                            </div>
                            <input type="submit">
                        </div>

                    </form>
                </main>

        @endforeach


@endsection
