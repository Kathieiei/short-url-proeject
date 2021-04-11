@extends('layouts.app')

@section('content')

<form action="/save" method="post">
    @csrf
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">

                <div class="from-group">
                    <h3>Create Short URL</h3>
                    <span></span>
                </div>

                <div class="justify-content-center text-center mt-3">
                    <input class="h-100 w-auto " type="text" name="long_url" placeholder="Past Long URL">
                </div>
                <div class="btn-toolbar justify-content-center mt-3">
                    <div class="bnt-group">
                        <button class="btn btn-primary" type="submit">Create Short URL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

