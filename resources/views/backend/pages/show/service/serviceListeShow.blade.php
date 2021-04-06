@extends('adminlte::page')
@section('content')
    <h3>Show:</h3>
    <h4 class="mt-4">information sur le service:</h4>
    <div class="d-flex mt-5" style="justify-content: center">


        <div class="card shadow" style="width: 25rem;" >
            <div class="d-flex mt-2" style="justify-content: center">
                <i class="{{$show->icons->name}} fa-7x"></i>
            </div>
            <div class="card-body">
                <h5 class="card-text"> <span  class="text-warning">Titre:</span> {{ $show->titre }}</h5>
                <p class="card-text"> <span  class="text-warning">Description:</span>  {{ $show->texte }}</p>
                <div class="d-flex mt-3" style="justify-content: center">
                    <a href="{{ $show->id }}/edit" class="btn btn-warning m-3">Edit</a>
                    <a href="/serviceListe" class="btn btn-info m-3">Retour</a>

                </div>

            </div>
        </div>
    </div>


@endsection
