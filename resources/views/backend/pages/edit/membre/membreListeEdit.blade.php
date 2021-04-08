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
    <form action="/membre/{{$edit->id}}" method="POST" class="mt-5" > 
        <h4>{{$edit->prenom}} {{$edit->nom}}</h4>
        @csrf
        @method('PATCH')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Role:</label>
            <select class="form-control" name="role_id" id="">
                @foreach ($role as $item)
                    <option  value="{{$item->id}}">{{$item->role}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Poste:</label>
            <select class="form-control" name="poste_id" id="">
                @foreach ($poste as $item)
                    <option  value="{{$item->id}}">{{$item->poste}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-warning mt-4 mb-4">Editer</button>
            <a  class="btn btn-info" href="/membre">Retour</a>

        </div>
      </form>
</div>
@endsection