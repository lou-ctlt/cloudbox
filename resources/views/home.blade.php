@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <!-- Début partie connexion réussie -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Fin partie connexion réussie -->

                    <!-- Début partie boîtes -->
                    <div class="row d-flex justify-content-around">
                    @foreach($boxes as $box)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header d-flex justify-content-around">
                                    <a type="button" class="btn btn-dark" href="{{ url('user/singlebox/' . $box->id) }}">{{$box->name}}</a>
                                    <a type="button" class="btn btn-dark" href="{{ url('user/updateboxform/' . $box->id) }}"><i class="fas fa-pen-square"></i></a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <span>{{$box->description}}</span>
                                    </div>
                                    <div class="row d-flex flex-row-reverse">
                                        <a type="button" class="btn btn-dark" href="{{ url('user/deletebox/' . $box->id) }}"><i class="fas fa-trash"></i></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a type="button" class="newbutton" href="{{ url('user/boxform') }}">+</a>
                    <!-- Fin partie boîtes -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection