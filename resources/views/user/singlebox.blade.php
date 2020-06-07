@extends('layouts.app')

@section('CSS')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @foreach($boxes ?? '' as $box)
            <div class="card">
                <div class="card-header">{{$box->name}}</div>

                <div class="card-body">
                    {{$box->description}} <br>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom du fichier</th>
                                <th>Aperçu</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                            <tr>
                                <td style="height: 100px">{{$file->name}}<br> 
                                                @if($file->description != 'NULL')
                                                <small>{{$file->description}}</small>
                                                @endif</td>
                                <td style="height: 100px">
                                    <a type="button" class="btn btn-dark" href="\storage\box\{{ $file->file_path }}">
                                    @if($file->extension != 'pdf')<img style="width: 100px" src="\storage\box\{{ $file->file_path }}" alt="img">
                                    @else <span><i class="fas fa-file-pdf"></i></span>
                                    @endif
                                    </a>
                                <td style="height: 100px"><a type="button" class="btn btn-dark" href="{{ url('user/updatefileform/' . $file->id) }}"><i class="fas fa-pen-square"></i></a></td>
                                <td style="height: 100px"><a type="button" class="btn btn-dark"  href="{{ url('user/deletefile/' . $file->id) }}"><i class="fas fa-trash"></i></a></td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
            <a type="button" class="btn btn-dark" href="{{ route('home') }}">RETOUR</a>
            <a type="button" class="newbutton" href="{{ url('user/box/' . $box->id . '/fileform') }}">+</a>
            @endforeach
        </div>
    </div>
</div>

@endsection