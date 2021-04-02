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
            <th scope="col">src</th>
            <th scope="col">nom</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($carousel as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->src}}</td>
              <td>{{$item->nom}}</td>
              <td>
                <a href="carousel/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td> 
              <td>
                <a href="/carousel/{{$item->id}}" class="btn btn-warning">SHOW</a>
                </td>
                <td>
                    <form action="/carousel/{{ $item->id }}" method="POST">
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
{{-- ajouter --}}
<div style="border: solid black 2px" class="p-5">
    <label>Ajouter une nouvelle image: </label>
     <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="/carousel" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="">
            <div class="form-group">
              <label for="titre">Nom:</label>
              <input type="text" class="form-control" id="href" name="nom">
            </div>
            <div class="form-group ">
              <label for="href">Image:</label>
              <input type="file"  id="href" name="src">
            </div>
          </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning mt-4 mb-4">Ajouter</button>

        </div>
    </form>
</div>
    
@endsection