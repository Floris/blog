@extends('layouts.dashboard_layout')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Comments</h1>
        </div>

        <div class="container" style="margin-top: 50px">



            <div class="row justify-content-center">
                {{--<div class="col-md-10">--}}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $key => $comment)

                        <tr>
                            <th scope="row">{{$comment->user_email}}</th>
                            <td>{!! str_limit(strip_tags($comment->comment), $limit = 100, $end = ' [...]') !!}</td>
                            <td>Published on:
                               {{date_format($comment->created_at,"j F, Y g:ia") }}</td>
                            <td>
                                <form action="{{ url('/dashboard/comment/'.$comment->id) }}" method="post">
                                    <input type="text" name="id" value="{{$comment->id}}" style="display: none;">
                                    @csrf
                                    <input type="submit" style="background-color: #ef5777; color:white;" value="delete">
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{--</div>--}}
            </div>
        </div>

@endsection