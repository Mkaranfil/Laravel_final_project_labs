@extends('adminlte::page')
@section('content')
    <div>
        @if (session('delete'))
            <div class="alert alert-warning" role="alert">
                {{ session('delete') }}
            </div>
        @endif
    </div>
    <div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div>
        <h2>Profile de {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h2>
        <div class="row  m-5" style="justify-content: center">


            <div class="card shadow m-3" style="width: 25rem;">
                <div class="d-flex mt-2" style="justify-content: center">
                    <img class="img-circle" src="{{ asset('storage/img/users/' . Auth::user()->user_pictures->src) }}"
                        class="card-img-top" style="height: 100px; width: 100px">

                </div>
                <div class="card-body">
                    <h5 class="card-text"> <span class="text-warning">Nom:</span> {{ Auth::user()->prenom }}
                        {{ Auth::user()->nom }} </h5>
                    <h5 class="card-title"><span class="text-warning">Poste:</span> {{ Auth::user()->postes->poste }}</h5>
                {{-- <p class="card-text"> <span class="text-warning">Description:</span> {{ Auth::user()->description }}</p> --}}
                <form action="/selfUser/{{$edit->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                <div class="mt-4">
                    <p class="card-text"> <span class="text-warning">Description:</span></p>
                    <textarea name="description" id="" cols="50" rows="10">{!! old('description') ? old('description') : $edit->description !!}</textarea><br>
                </div>
                    <div class="d-flex" style="justify-content: center">
                        <div class="mr-2">
                            <button type="submit" class="btn btn-warning">Confirmer le changement</button>
                        </div>
                        <div>
                            <a href="/selfUser/{{Auth::user()->id}}" class="btn btn-info">retour</a>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>


@endsection
