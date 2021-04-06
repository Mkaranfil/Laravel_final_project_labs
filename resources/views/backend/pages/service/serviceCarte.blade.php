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
<h1 style="text-decoration: underline">Carte de la page service:</h1>
<div>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($serviceCarte as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td> {{$item->titre}}</td>
              <td>
                <a href="serviceCarte/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>
              <td>
                <a href="/serviceCarte/{{$item->id}}" class="btn btn-warning">SHOW</a>
                </td>
                <td>
                    <form action="/serviceCarte/{{ $item->id }}" method="POST">
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
    <h3>Ajouter une nouvelle carte: </h3>
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
    {{-- nouveau --}}
    <form action="/serviceCarte" method="POST" class="mt-5" enctype="multipart/form-data" > 
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Titre:</label>
            <input type="text" class="form-control" id="inputEmail4" name="titre" value="{{old('titre')}}">
          </div>
        </div>
        <div class="form-group ">
            <label for="href">Une image representant le projet:</label>
            <input type="file"  id="href" name="src">
          </div>
        <div class="mt-4 d-flex">
            <label class="mr-3"for="titre">Texte:</label>
            <textarea name="texte" id="" cols="90" rows="7" >{{old('texte')}}</textarea>
         </div>
         <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning mt-4 mb-4">Ajouter</button>

        </div>
      </form>
</div>
@endsection