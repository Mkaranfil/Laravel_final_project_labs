@extends('adminlte::page')
    @section('content')
    <div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

        <h3>Modifier: </h3>
        <form action="/navbar/{{$edit->id}}" method="POST" class="mt-3">
            @csrf
            @method('PATCH')
            {{-- validate --}}
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="href" name="titre" value="{{old('titre') ? old('titre') : $edit->titre}}">
                </div>
                <div class="form-group col-md-6">
                <label for="href">Lien</label>
                <input type="text" class="form-control" id="href" name="href" value="{{old('href') ? old('href') : $edit->href}}">
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-warning mt-4 mb-4">Editer</button>
                <a  class="btn btn-info" href="/navbar">Retour</a>

            </div>
            <div class="d-flex justify-content-center">

            </div>
        </form>
        
    @endsection