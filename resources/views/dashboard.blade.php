@extends('layouts.dashboard_layout')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="text-align: center">

                        <a href="dashboard/posts">Posts: @if($post == null) 0 @else{{$post}}@endif</a>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="text-align: center">

                        <a href="dashboard/drafts">Drafts: @if($draft == NULL) 0 @else{{$draft}}@endif</a>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="text-align: center">

                        <a href="dashboard/create">Create New Post</a>


                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="text-align: center">

                        <a href="dashboard/comments">Comments: @if($comments == null) 0 @else{{$comments}}@endif</a>


                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 50px;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="text-align: center">Recent Posts:</div>

                    @foreach($recent_posts as $key => $recent_post)
                        <div class="card-body">
                            <?php echo "<p>Published on: ".date('j F, Y g:ia', strtotime($recent_post->created_at))."</p>";  ?>
                            {{--<p>Published on: {{ date_format($recent_post->created_at, 'j F, Y g:ia' )}}</p>--}}
                            <a href="{{ url('/dashboard/post/'.$recent_post->id) }}">{{$recent_post->title}}</a>
                            <p>{!! str_limit(strip_tags($recent_post->post_content), $limit = 100, $end = ' [...]') !!}</p>

                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="text-align: center">Recent Comments:</div>
                    <div class="card-body">

                        @foreach($recent_comments as $key => $recent_comment)
                            <div class="card-body">
                                {{$recent_comment->user_email}}
                                <?php echo "<p>Commented on: ".date('j F, Y g:ia', strtotime($recent_comment->created_at))."</p>";  ?>
{{--                                <p>Commented on {{ date_format($recent_comment->created_at, 'j F, Y g:ia' )}}</p>--}}
                                <p>{!! str_limit(strip_tags($recent_comment->comment), $limit = 100, $end = ' [...]') !!}</p>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </
@endsection