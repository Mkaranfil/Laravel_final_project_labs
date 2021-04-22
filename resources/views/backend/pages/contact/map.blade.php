@extends('adminlte::page')
@section('content')
    <h3>Map:</h3>
    <div class="d-flex mt-5" style="justify-content: center">
        <div class="card shadow"  >
            <div class="d-flex mt-2" style="justify-content: center">
                <div class="map" id="map-area"><iframe src="{{$map[0]->src}}" width="500px" height="500px" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
            </div>
            <div class="card-body">
                <p class="card-text"> <span  class="text-warning">Texte:</span></p>
                <div class="d-flex mt-3" style="justify-content: center">
                    <a href='/map/{{$map[0]->id}}/edit' class="btn btn-warning m-3">Edit</a>
                </div>

            </div>
        </div>
    </div>


@endsection
