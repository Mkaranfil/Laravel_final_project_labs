@extends('adminlte::page')


@section('content')
    <div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    {{-- aEditer--}}
    <div style="border: solid black 2px" class="p-5">
        <h3>Editer: </h3>
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
        {{-- nouveau --}}
        <form action="/blogArticle/{{$edit->id}}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Titre:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="titre" value="{{old('titre') ? old('titre') : $edit->titre}}">
                </div>
                <div class="form-group col-md-6">
                    <label>Categorie:</label>
                    <select class="form-control" name="categorie_id" id="">
                        <option value="{{$edit->categories->id}}">{{$edit->categories->nom}}</option>
                        @foreach ($categorie as $item)
                            {{-- @if ($item->id != $edit->categorie_id) --}}
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            {{-- @endif --}}
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6" >
                    <label>Tags:</label>
                @foreach ($tag as $item)
                    <div>
                        <label for="text">{{$item->tag}} </label> 
                        <input type="checkbox" name="tag[]" id="" value="{{$item->id}}">
                    </div>
                @endforeach
                </div>
            </div>

            <div class="form-group mt-2">
                <label for="href">Une image de couverture:</label>
                <input type="file" id="href" name="src">
            </div>
            <div class="mt-4">
                <label class="mr-3" for="titre">Texte:</label> <br>
                <textarea name="texte" id="" cols="120" rows="15">{!! old('texte') ? old('texte') : $edit->texte !!}</textarea>
                <span>astuce HTML: Ajoutez le code {{$br}} pour retourner a la ligne</span>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-warning">Confirmer</button>
                <a  class="btn btn-info ml-3" href="/blogArticle">Retour</a>
            </div>

        </form>
    </div>
@endsection
