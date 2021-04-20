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
    <form action="/contactAdresse/{{$edit->id}}" method="POST" class="mt-5" enctype="multipart/form-data" > 
        @csrf
        @method('PATCH')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Rue:</label>
            <input type="text" class="form-control" id="inputEmail4" name="rue" value="{{old('rue') ? old('rue') : $edit->rue}}">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Numero:</label>
            <input type="text" class="form-control" id="inputPassword4" name="numero" value="{{old('numero') ? old('numero') : $edit->numero}}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Commune:</label>
            <input type="text" class="form-control" id="inputEmail4" name="commune" value="{{old('commune') ? old('commune') : $edit->commune}}">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Code postale:</label>
            <input type="text" class="form-control" id="inputPassword4" name="code_postale" value="{{old('code_postale') ? old('code_postale') : $edit->code_postale}}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Tel:</label>
            <input type="text" class="form-control" id="inputEmail4" name="tel" value="{{old('tel') ? old('tel') : $edit->tel}}">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Email:</label>
            <input type="text" class="form-control" id="inputPassword4" name="email" value="{{old('email') ? old('email') : $edit->email}}">
          </div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-warning mt-4 mb-4">Editer</button>
            <a  class="btn btn-info" href="/contactAdresse">Retour</a>

        </div>
      </form>
</div>
@endsection