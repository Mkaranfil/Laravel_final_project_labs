@extends('adminlte::page')


@section('content')
<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
<div>
    @if (session('delete'))
        <div class="alert alert-warning" role="alert">
            {{ session('delete') }}
        </div>
    @endif
</div>
{{-- <h1 style="text-decoration: underline">Liste des commentaires valides:</h1> --}}
{{-- liste des cpms validdess --}}
<div class="mt-5">
    <h3 style="text-decoration: underline">Liste des commentaires valides:</h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo de profil</th>
            <th scope="col">Nom</th>
            <th scope="col">Article</th>
            <th scope="col">Commentaire</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($coms->where('check','==', 1) as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>
                <img class="img-circle" src="{{ asset('storage/img/users/' . $item->user_pictures->src) }}"  style="height: 100px; width: 100px">
                </td>
              <td>{{$item->nom}}</td>
              <td>{{$item->posts->titre}}</td>
              <td>{{$item->commentaire}} </td>
              <td>{{$item->email}} </td>
                <td>
                    <form action="/commentaire/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>   
            </tr>
            @endforeach
        </tbody>
      </table>
</div>

{{-- liste des coms no valides --}}
<div class="mt-5">
    <h3 style="text-decoration: underline">Liste des commentaires NON valides:</h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo de profil</th>
            <th scope="col">Nom</th>
            <th scope="col">Article</th>
            <th scope="col">Commentaire</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($coms->where('check','==', 0) as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>
                <img class="img-circle" src="{{ asset('storage/img/users/' . $item->user_pictures->src) }}"  style="height: 100px; width: 100px">
                </td>
              <td>{{$item->nom}}</td>
              <td>{{$item->posts->titre}}</td>
              <td>{{$item->commentaire}} </td>
              <td>{{$item->email}} </td>
              <td>
                <form action="/validerComs/{{ $item->id }}">
                    @csrf
                    <button type="submit" class="btn btn-success">VALIDER</button>
                </form>
               </td>
                <td>
                    <form action="/commentaire/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>   
            </tr>
            @endforeach
        </tbody>
      </table>
</div>


</div>
@endsection