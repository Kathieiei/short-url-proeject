

@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        @if($message = Session ::get('success'))
            <div class= "alert alert-success mt-3">
                <p>{{$message}}</p>

            </div>
        @endif
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <form action="{{url('/new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="from-group">
                                <span>Create Short URL</span>
                                <textarea class="form-control" name="code" rows="1" id="code"></textarea>
                            </div>

                            <div class="btn-toolbar justify-content-center mt-3">
                                <div class="bnt-group">
                                    <button class="btn btn-primary" type="submit">Create Short URL</button>
                                </div>
                            </div>
                        </form>

                            @if(!$shortlinks->isEmpty())
                                @foreach($shortlinks as $shortlink)
                                    <div class="card-body text-center">
                                        <p class="card-text">
                                            {{$shortlink->link}}
                                        </p>
                                    </div>
                                @endforeach
                            @endif


                    </div>
                </div>

            </div>
        </div>
@endsection


