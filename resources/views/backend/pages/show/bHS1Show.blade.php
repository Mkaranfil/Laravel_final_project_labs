@extends('adminlte::page')
    @section('content')
    <h3>Show:</h3>
    <div class="mt-5">
        <h4>Big:</h4>
        <div style="border: solid black 2px" >
            <div class="d-flex m-2" style="justify-content: center">
                <img src="{{asset('storage/img/'.$show->src)}}" alt="" height="400px" width="700px">
            </div>
            <div class="d-flex m-2" style="justify-content: center">
                <p>{{$show->nom}}</p>
            </div>
        </div>
    </div>
    <div class="d-flex mt-3" style="justify-content: center">
       <a href="{{$show->id}}/edit" class="btn btn-warning m-3">Edit</a>
       <a href="/carousel" class="btn btn-info m-3">Retour</a>

    </div>


    @endsection