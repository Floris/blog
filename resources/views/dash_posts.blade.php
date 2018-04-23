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
                    <form action="{{ url('/dashboard/posts/checkboxes') }}" method="post">
                        @csrf
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col"><input type="submit" style="background-color: #b8daff; color:white;"
                                                   value="Draft"></th>
                            <th scope="col"><input type="submit" style="background-color: #ef5777; color:white;"
                                                   value="Delete"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dash_posts as $key => $value)

                            <tr>
                                <td scope="row">{{$value->id}}</td>
                                <td><a href="{{ url('/dashboard/post/'.$value->id) }}">{{$value->title}}</a></td>
                                <?php echo "<td>Published on: " . date('j F, Y g:ia', strtotime($value->created_at)) . "</td>";  ?>
                                {{--                    <td>Published on: {{ date_format($value->created_at, 'j F, Y g:ia' )}}</td>--}}
                                <td><input type="checkbox" name="post_id_make_public[]" value="{{$value->id}}"></td>
                                <td><input type="checkbox" name="post_id_delete[]" value="{{$value->id}}"></td>
                                <input type="text" name="make_draft" value="{{$value->id}}" style="display: none;">
                            </tr>

                        @endforeach
                        </tbody>
                    </form>
                </table>
                {{--</div>--}}
            </div>
        </div>

@endsection