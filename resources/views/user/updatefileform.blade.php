@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    @foreach($files as $file)
        <div class="col-md-12">
           <form method="POST" action="{{ url('user/updatefile') }}" enctype="multipart/form-data">
                @csrf 
                <input type="text" name="id" value="{{ $file->id }}" hidden>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <label for="name" class="col-md-8 col-form-label">{{ __('Nom') }}</label>
                        <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="{{ $errors->has('name') ? old(name) : $file->name }}" autocomplete="name" autofocus>
                    
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
                        <input id="description" type="text" name="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}" value="{{ $errors->has('description') ? old(description) : $file->description }}" autocomplete="description" autofocus>
                    
                        @if ( $errors->has('description') )
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <label for="file_path" class="col-md-8 col-form-label">{{ __('Changer le fichier') }}</label>
                        <input type="file" class="form-control-file {{ $errors->has('file_path') ? 'has-error' : ' '}}" name="file_path" value="{{ $errors->has('file_path') ? old(file_path) : $file->file_path }}">
                             
                        @if ( $errors->has('file_path') )
                            <span class="help-block">
                                <strong>{{ $errors->first('file_path') }}</strong> 
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
    @endforeach
    </div>
</div>

@endsection  