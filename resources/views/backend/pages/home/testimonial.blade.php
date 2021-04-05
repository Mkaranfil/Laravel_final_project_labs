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
<h1 style="text-decoration: underline">Testimonial:</h1>
<div>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Company</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($testi as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->nom}} {{$item->prenom}}</td>
              <td>{{$item->company}}<td>
              <td>
                <a href="testimonial/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>
              <td>
                <a href="/testimonial/{{$item->id}}" class="btn btn-warning">SHOW</a>
                </td>
                <td>
                    <form action="/testimonial/{{ $item->id }}" method="POST">
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
    <h3>Ajouter un nouveau commentaire: </h3>
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
    <form action="/testimonial" method="POST" class="mt-5" enctype="multipart/form-data" > 
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nom:</label>
            <input type="text" class="form-control" id="inputEmail4" name="nom" value="{{old('nom')}}">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Prenom:</label>
            <input type="text" class="form-control" id="inputPassword4" name="prenom" value="{{old('prenom')}}">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Nom de la Societe: </label>
          <input type="text" class="form-control" id="inputAddress" name="company" value="{{old('company')}}">
        </div>
        <div class="form-group ">
            <label for="href">Une image de la personne ou de la societe :</label>
            <input type="file"  id="href" name="src">
          </div>
        <div class="mt-4 d-flex">
            <label class="mr-3"for="titre">Commentaire:</label>
            <textarea name="texte" id="" cols="90" rows="7" >{{old('texte')}}</textarea>
         </div>
         <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning mt-4 mb-4">Ajouter</button>

        </div>
      </form>
</div>
@endsection