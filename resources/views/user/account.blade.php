@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="flex-center position-ref full-height">
                <h1>Hello {{ Auth::user()->name }} ! This is your space !</h1>
            </div>
        </div>
    </div>
</div>

@endsection