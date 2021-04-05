@extends('adminlte::page')
@section('content')
    <h3>Show:</h3>
    <h4 class="mt-4">information sur la personne:</h4>
    <div class="d-flex mt-5" style="justify-content: center">


        <div class="card shadow" style="width: 25rem;" >
            <div class="d-flex mt-2" style="justify-content: center">
                <img class="img-circle" src="{{ asset('storage/img/avatar/' . $show->testi_pictures->src) }}"
                    class="card-img-top" style="height: 100px; width: 100px">

            </div>
            <div class="card-body">
                <h5 class="card-text"> <span  class="text-warning">Nom:</span> {{ $show->nom }} {{ $show->prenom }} </h5>
                <h5 class="card-title"><span  class="text-warning">Societe:</span>  {{ $show->company }}</h5>
                <p class="card-text"> <span  class="text-warning">Commentaire:</span>  {{ $show->texte }}</p>
                <div class="d-flex mt-3" style="justify-content: center">
                    <a href="{{ $show->id }}/edit" class="btn btn-warning m-3">Edit</a>
                    <a href="/testimonial" class="btn btn-info m-3">Retour</a>

                </div>

            </div>
        </div>
    </div>


@endsection
