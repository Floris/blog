 {{$comments = DB::table('comments')->select('*')->where('page_id', '=', '' )->get($value->id)}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body comments">
                        <form action="{{url()->full()}}" method="post">
                            <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display: none;">
                            <input type="text" name="user_email" value="{{Auth::user()->email}}" style="display: none;">
                            {{--<input type="text" name="page_id" value="{{$value->id}}" style="display: none;">--}}
                            {{--<input type="text" name="page_id" value="{{$value->id}}" style="display: none;">--}}

                            <textarea class="form-control" name="" id="" cols="30" rows="10"
                                      placeholder="Type comment here..."></textarea>
                            @csrf
                            <input class="form-control" type="submit"></input>
                        </form>
                        {{--@foreach($comments as $key => $comment)--}}

                        {{--@endforeach--}}
                    </div>
                </div>
            </div>
        </div>
</div>
