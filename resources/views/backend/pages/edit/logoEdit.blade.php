@extends('adminlte::page')

@section('content')
<div>
    @if (session('logo'))
        <div class="alert alert-success" role="alert">
            {{ session('logo') }}
        </div>
    @endif
</div>
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
    <form action="/logo/{{$edit->id}}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PATCH')
        <div class="">
            <div class="form-group ">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="href" name="titre" value="{{old('titre') ? old('titre') : $edit->titre}}">
            </div>
            <div class="mt-5">
            <label for="href">Logo: </label>
            <input type="file"  id="href" name="src" value="{{$logo[0]->src}}">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-warning">Editer</button>
            <a  class="btn btn-info ml-2" href="/logo">
                Retour
            </a>

        </div>
        <div class="d-flex justify-content-center">

        </div>
    </form>

@endsection