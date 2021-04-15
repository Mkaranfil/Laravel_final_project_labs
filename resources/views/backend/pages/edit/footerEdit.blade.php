@extends('adminlte::page')
    @section('content')
    <div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

        <h3>Modifier: </h3>
        <form action="/footer/{{$edit->id}}" method="POST" class="mt-3">
            @csrf
            @method('PATCH')
            {{-- validate --}}
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
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="titre">Texte 1</label>
                <input type="text" class="form-control" id="href" name="span1" value="{{old('span1') ? old('span1') : $edit->span1}}">
                </div>
                <div class="form-group col-md-6">
                <label for="href">Texte 2 </label>
                <input type="text" class="form-control" id="href" name="span2" value="{{old('span2') ? old('span2') : $edit->span2}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="href">Url</label>
                    <p>AIDE: ce url serat accesible en clicant sur le texte 2</p>
                    <input class="form-control"  type="text" name="url"value="{{old('url') ? old('url') : $edit->url}}" >
                </div>

            </div>
            <div class="">
                <button type="submit" class="btn btn-warning mt-4 mb-4">Editer</button>
                <a  class="btn btn-info" href="/footer">Retour</a>

            </div>
            <div class="d-flex justify-content-center">

            </div>
        </form>
        
    @endsection