@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px; margin-bottom: 80px;">
        @foreach($home_posts as $key => $value)
            <div class="row justify-content-center" style=" margin-bottom: 50px;">
                <div class="col-md-10">
                    <a href="{{ url('/post/'.$value->id) }}" style="padding-top: 30px;">
                        <h2>{{$value->title}}</h2></a>

                    {{--sometimes date_format gives errors--}}
{{--                    <p>{{ date_format($value->created_at, 'j F, Y g:ia' )}}</p>--}}

                    <?php echo "<p>".date('j F, Y g:ia', strtotime($value->created_at))."</p>";  ?>
                    <p>Kerntaken: {{ str_replace(",",", ",$value->tags) }}</p>


                    {{-- with preg_replace all h4 get filtered out // strip_tags removes all html elements--}}
                    {!! str_limit(strip_tags(preg_replace('#(<h5.*?>).*?(</h5>)#', '$1$2', $value->post_content)), $limit = 400, $end = ' [...]') !!}
                </div>
            </div>
        @endforeach
            {{$home_posts->links()}}
    </div>

@endsection
