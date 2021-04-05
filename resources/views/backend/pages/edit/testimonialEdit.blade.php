@extends('adminlte::page')


@section('content')
<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
{{-- editer --}}
<div style="border: solid black 2px" class="p-5">
    <h3>Modifier: </h3>
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
    <form action="/testimonial/{{$edit->id}}" method="POST" class="mt-5" enctype="multipart/form-data" > 
        @csrf
        @method('PATCH')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nom:</label>
            <input type="text" class="form-control" id="inputEmail4" name="nom" value="{{old('nom') ? old('nom') : $edit->nom}}">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Prenom:</label>
            <input type="text" class="form-control" id="inputPassword4" name="prenom" value="{{old('prenom') ? old('prenom') : $edit->prenom}}">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Nom de la Societe: </label>
          <input type="text" class="form-control" id="inputAddress" name="company" value="{{old('company') ? old('company') : $edit->company}}">
        </div>
        <div class="form-group ">
            <label for="href">Une image de la personne ou de la societe :</label>
            <input type="file"  id="href" name="src">
          </div>
        <div class="mt-4 d-flex">
            <label class="mr-3"for="titre">Commentaire:</label>
            <textarea name="texte" id="" cols="90" rows="7" >{{old('texte') ? old('texte') : $edit->texte}}</textarea>
         </div>
         <div class="">
            <button type="submit" class="btn btn-warning mt-4 mb-4">Editer</button>
            <a  class="btn btn-info" href="/testimonial">Retour</a>

        </div>
      </form>
</div>
@endsection