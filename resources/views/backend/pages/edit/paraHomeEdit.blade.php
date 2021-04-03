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
        <form action="/paraHome/{{$edit->id}}" method="POST" class="mt-3">
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
            <div class="">
                <div class="">
                <label for="href">Info:</label>
                <input type="text" class="form-control" id="href" name="info" value="{{old('info') ? old('info') : $edit->info}}">
                </div>
                <div class="mt-4 d-flex">
                <label class="mr-3"for="titre">Texte:</label>
                <textarea name="texte" id="" cols="90" rows="7">{{old('texte') ? old('texte') : $edit->texte}}</textarea>
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-warning mt-4 mb-4">Editer</button>
                <a  class="btn btn-info" href="/paraHome">Retour</a>

            </div>
            <div class="d-flex justify-content-center">

            </div>
        </form>
        
    @endsection