@extends('adminlte::page')

@section('content')

<div>
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
    <h1 style="text-decoration: underline">Footer:</h1>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Texte 1 </th>
            <th scope="col">Url lie au texte 2 </th>
            <th scope="col">Texte 2</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($footer as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->span1}}</td>
              <td>{{$item->url}}</td>
              <td>{{$item->span2}}</td>
              <td>
                <a href="footer/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>   
            </tr>
            @endforeach
        </tbody>
      </table>
</div>

    
@endsection