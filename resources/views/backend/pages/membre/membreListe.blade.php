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
<h1 style="text-decoration: underline">Liste des membres inscrits et valides:</h1>
{{-- liste de l'equipe --}}
<div class="mt-5">
    <h3>L'equipe du Site: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Roles</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($membre->where('check','==', 1)->where('role_id','!=',4) as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->nom}} {{$item->prenom}}</td>
              <td>{{$item->roles->role}}<td>
              <td>
                <a href="membre/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>
              <td>
                <a href="/membre/{{$item->id}}" class="btn btn-warning">SHOW</a>
                </td>
                <td>
                    <form action="/membre/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>   
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
<div class="mt-5">
    {{-- liste des membres --}}
    <h3>Tables des Membres valides: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Poste</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($membre->where('check','==', 1)->where('role_id','==',4) as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->nom}} {{$item->prenom}}</td>
              <td>{{$item->postes->poste}}<td>
              <td>
                <a href="membre/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>
              <td>
                <a href="/membre/{{$item->id}}" class="btn btn-warning">SHOW</a>
                </td>
                <td>
                    <form action="/membre/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>   
            </tr>
            @endforeach
        </tbody>
      </table>
</div>

</div>
@endsection