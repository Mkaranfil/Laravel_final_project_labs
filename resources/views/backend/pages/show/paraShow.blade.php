@extends('adminlte::page')
    @section('content')
    <h3>Show:</h3>
    <h4 class="mt-4">info:</h4>
    <div style="border: solid black 2px">
        <div class="m-3">
            <label>{{$show->info}}</label>
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
       <a href="{{$show->id}}/edit" class="btn btn-warning m-3">Edit</a>
       <a href="/paraHome" class="btn btn-info m-3">Retour</a>

    </div>


    @endsection