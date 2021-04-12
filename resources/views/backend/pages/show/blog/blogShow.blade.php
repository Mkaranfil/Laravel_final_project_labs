@extends('adminlte::page')
    @section('content')
    <h3>Show Artcile:</h3>
    <h4 class="mt-4">info:</h4>
    <div class="mt-5">
        <h4>Image de couverture:</h4>
        <div style="border: solid black 2px" >
            <div class="d-flex m-2" style="justify-content: center">
                <img  src="{{asset('storage/img/blog/'.$show->blog_pictures->src)}}" alt="" height="400px" width="700px">
            </div>
        </div>
    </div>
    <div class="mt-3" style="border: solid black 2px">
        <div class="ml-3">
            <label class="text-warning">Auteur:</label>
            <label>{{$show->users->nom}} {{$show->users->prenom}}</label>
        </div>
        <div class="ml-3">
            <label class="text-warning">Titre:</label>
            <label>{{$show->titre}}</label>
        </div>
        <div class="ml-3">
            <label class="text-warning">Categorie:</label>
            <label>{{$show->categories->nom}}</label>
        </div>
        <div class="ml-3">
            <label class="text-warning">Tags:</label>
        @foreach ($show->tags as $item)
            <label>{{$item->tag}},</label>   
        @endforeach
        </div>
    </div>
    <div class="mt-5">
        <h4>Texte:</h4>
        <div style="border: solid black 2px" >
            <div class="d-flex m-2" style="justify-content: center">
                <p>{{$show->texte}}</p>
            </div>
        </div>
    </div>
    <div class="d-flex mt-3" style="justify-content: center">
       <a href="/blogArticle/{{$show->id}}/edit" class="btn btn-warning m-3">Edit</a>
       <a href="/blogArticle" class="btn btn-info m-3">Retour</a>

    </div>


@endsection

