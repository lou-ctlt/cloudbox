@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ url('user/newbox') }}" enctype="multipart/form-data">
                @csrf 
                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <label for="name" class="col-md-8 col-form-label">{{ __('Nom') }}</label>
                        <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}">
                    
                        @if ( $errors->has('name') )
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <label for="description" class="col-md-8 col-form-label">{{ __('Description') }}</label>
                        <input id="description" type="text" name="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}">
                    
                        @if ( $errors->has('description') )
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-dark">{{ __('Créer') }}</button>
                    <a type="button" class="btn btn-dark" href="{{ route('home') }}">RETOUR</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection  