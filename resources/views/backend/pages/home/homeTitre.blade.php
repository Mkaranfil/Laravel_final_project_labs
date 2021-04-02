@extends('adminlte::page')

@section('content')

<div>
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
    <h1 style="text-decoration: underline">Images du carousel:</h1>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">titre</th>
            <th scope="col">description</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($homeTitre as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->titre}}</td>
              <td>{{$item->description}}</td>
              <td>
                <a href="homeTitre/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>   
            </tr>
            @endforeach
        </tbody>
      </table>
</div>

    
@endsection