
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
<h1 style="text-decoration: underline">Contact Adresse:</h1>
<div>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Rue</th>
            <th scope="col">Numero</th>
            <th scope="col">Commune</th>
            <th scope="col">Code Postale</th>
            <th scope="col">Tel</th>
            <th scope="col">Email</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contactAdresse as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->rue}}</td>
              <td>{{$item->numero}}</td>
              <td>{{$item->commune}}</td>
              <td>{{$item->code_postale}}</td>
              <td>{{$item->tel}}</td>
              <td>{{$item->email}}</td>
              <td>
                <a href="contactAdresse/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>
                {{-- <td>
                    <form action="/contactUs/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>   --}}
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
{{-- ajouter --}}
@endsection