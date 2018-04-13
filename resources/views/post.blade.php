@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 45px; margin-bottom: 50px;">
        @foreach($post as $key => $value)
            <a href="{{ url('/home')}}">Blog &lt; {{$value->title}}</a>
            <div class="row justify-content-center post">
                <div class="col-md-10">
                    <h2>{{$value->title}}</h2>
                    <div class="content">
                        {!! $value->post_content !!}
                    </div>
                    <p>{{ date_format($value->created_at, 'j F, Y g:ia' )}}</p>
                    <p>Kerntaken: {{ str_replace(",",", ",$value->tags) }}</p>
                </div>

                {{--GET COMMENT--}}
                <div class="comments col-md-10">
                    <h4>Comments</h4>
                    @foreach($comments as $key => $comment)

                        <div class="reply_comment">
                            <input type="text" name="reply_id" id="reply_id" value="{{$comment->id}}"
                                   style="display: none;">
                            <div class="comment_header">
                                <p>{{$comment->user_email}}
                                    says:
                                </p>
                            </div>

                            <p class="comment_content">{{ $comment->comment }}</p>
                            <button v-on:click="change('{{$comment->user_email}}', {{$comment->id}})">Reply
                            </button>
                        </div>
                        {{--SECOND ROW OF COMMENTS--}}
                        <?php $replies = DB::table('comments')->select('*')->where('reply_id', '=', $comment->id)->orderBy('created_at', 'DESC')->get() ?>
                        <div class="reply">
                            @foreach($replies as $key => $reply)
                                <div class="reply_comment">
                                    <div class="comment_header">
                                        <p>{{$reply->user_email}} says:</p>
                                    </div>
                                    <p class="comment_content">{{$reply->comment}}</p>
                                    <button v-on:click="change('{{$reply->user_email}}', {{$reply->id}})">
                                        Reply
                                    </button>
                                </div>

                                {{--THIRD ROW OF COMMENTS--}}
                                <?php $replies_2nd_row = DB::table('comments')->select('*')->where('reply_id', '=', $reply->id)->orderBy('created_at', 'DESC')->get() ?>
                                <div class="reply">
                                    @foreach($replies_2nd_row as $key => $reply)
                                        <div class="reply_comment">
                                            <div class="comment_header">
                                                <p>{{$reply->user_email}} says:</p>
                                            </div>
                                            <p class="comment_content">{{$reply->comment}}</p>
                                        </div>
                                    @endforeach
                                </div>

                            @endforeach
                        </div>



                    @endforeach

                    {{--//FORM TO POST COMMENT--}}
                    <div class="form_comment">
                        <h4>Write a Reply or Comment </h4>
                        <p>@{{ reply_email }}</p>

                        <form action="{{url()->full()}}" method="post">
                            <input type="text" name="user_id" value="{{Auth::user()->id}}"
                                   style="display: none;">
                            <input type="text" name="user_email" value="{{Auth::user()->email}}"
                                   style="display: none;">
                            <input type="text" name="page_id" value="{{$value->id}}" style="display: none;">
                            <input type="text" v-model="reply" name="reply_id" style="display: none;">
                                    <textarea class="form-control" name="comment" id="" cols="10" rows="3"
                                              placeholder="Type comment here..."></textarea>
                            @csrf
                            <input class="form-control" type="submit"></input>
                        </form>
                        {{--@foreach($comments as $key => $comment)--}}

                        {{--@endforeach--}}
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
