{{--@extends('layouts.dashboard_layout')--}}

{{--@section('content')--}}

{{--@foreach($users as $key => $user)--}}
{{--{{$user->name}}--}}
{{--@endforeach--}}

{{--@endsection--}}

@extends('layouts.dashboard_layout')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
        </div>

        <div class="container" style="margin-top: 50px">



            <div class="row justify-content-center">
                {{--<div class="col-md-10">--}}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Last login</th>
                        <th scope="col">Login IP</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)

                        <tr>
                            <th scope="row">{{$user->name}}</th>
                            <td>{{$user->email}}</td>
                            <td> <?php echo date('j F, Y g:ia', strtotime($user->last_login)); ?>
                            </td>
                            <td>{{$user->last_login_ip}}</td>


                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{--</div>--}}
            </div>
        </div>

@endsection