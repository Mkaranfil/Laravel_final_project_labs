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
        <form action="/map/{{$edit->id}}" method="POST" class="mt-3">
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
                <div class="mt-4 ">
                <label class="mr-3"for="titre">Lien:</label>
            </div>
            <textarea name="src" id="" cols="90" rows="7">{{old('src') ? old('src') : $edit->src}}</textarea>
            <p>INFO: Veuillez coller UNIQUEMENT le Http du iframe obtenus sur google map</p>
            </div>
            <div class="">
                <button type="submit" class="btn btn-warning mt-4 mb-4">Editer</button>
                <a href="/map" class="btn btn-info m-3">Retour</a>
            </div>
            <div class="d-flex justify-content-center">

            </div>
        </form>
        
    @endsection