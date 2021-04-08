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
    <h3>Nouveaux membres:</h3>
    <div class="row  m-5" style="justify-content: center">
        
        @foreach ($membreNV as $item)
            <div class="card shadow m-3" style="width: 25rem;">
                <div class="d-flex mt-2" style="justify-content: center">
                    <img class="img-circle" src="{{ asset('storage/img/users/' . $item->user_pictures->src) }}"
                        class="card-img-top" style="height: 100px; width: 100px">

                </div>
                <div class="card-body">
                    <h5 class="card-text"> <span class="text-warning">Nom:</span> {{ $item->nom }} {{ $item->prenom }}
                    </h5>
                    <h5 class="card-title"><span class="text-warning">Poste:</span> {{ $item->postes->poste }}</h5>
                    <h5 class="card-title ml-3"><span class="text-warning">Role:</span> {{ $item->roles->role }}</h5>
                    <p class="card-text"> <span class="text-warning">Description:</span> {{ $item->description }}</p>
                    <div class="d-flex mt-3" style="justify-content: center">
                        <div>
                            <form action="/valider/{{ $item->id }}">
                                @csrf
                                <button type="submit" class="btn btn-success m-3">CONFIRMER</button>
                            </form>
                        </div>
                        <div>
                            <form action="/membre/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-3">DELETE</button>
                            </form>
                        </div>
                    </div>

                </div>
                @if ($loop->iteration % 2 == 0)
                </div>
                <div class="row">
                @endif
            </div>
    @endforeach

        </div>


@endsection
