
@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
    <p>{{$message}}</p>
@endif
<a href="/new">create</a>
<p class="justify-content-end">You Quota Remaining {{10-count($urls)}}/10</p>

<div class="col-8  text-center justify-content-center">
    <div class="text-center justify-content-center">

    @if(!$urls -> isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Long url</th>
                <th scope="col">Short url</th>
                <th scope="col">creat</th>
            </tr>
            </thead>
            {{--        <tr>--}}
            {{--            <td>Long url</td>--}}
            {{--            <td>Short url</td>--}}
            {{--            <td>creat</td>--}}
            {{--        </tr>--}}
            @foreach($urls as $url)
                <tbody>
                <tr>
                    <td>{{$url->code}}</td>
                    <td><a href="/gt/{{$url->link}}" target="_blank">{{$url->link}}</a></td>
                    <td>{{$url->created_at}}</td>
                </tr>

                </tbody>
                {{--            <tr>--}}
                {{--                <td>{{$url->code}}</td>--}}
                {{--                <td><a href="/gt/{{$url->link}}" target="_blank">{{$url->link}}</a></td>--}}
                {{--                <td>{{$url->created_at}}</td>--}}
                {{--            </tr>--}}

            @endforeach

        </table>
    </div>
</div>
@endif

@endsection
