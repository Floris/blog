@extends('layouts.dashboard_layout')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
        </div>

    <div class="container" style="margin-top: 50px">



        <div class="row justify-content-center">
            {{--<div class="col-md-10">--}}
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Tags</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
        @foreach($dash_posts as $key => $value)

                <tr>
                    <td scope="row">{{$value->id}}</td>
                    <td><a href="{{ url('/dashboard/post/'.$value->id) }}">{{$value->title}}</a></td>
                    <td> [...] </td>
                    <?php echo "<td>Published on: ".date('j F, Y g:ia', strtotime($value->created_at))."</td>";  ?>
{{--                    <td>Published on: {{ date_format($value->created_at, 'j F, Y g:ia' )}}</td>--}}
                    <td><a href="/preview/{{$value->id}}">Preview</a></td>
                    <td>
                        <form action="{{ url('/dashboard/post/'.$value->id).'/backtodraft' }}" method="post">
                        <input type="text" name="id" value="{{$value->id}}" style="display: none;">
                        @csrf
                        <input type="submit" value="Back to Draft">
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