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
    <h1 style="text-decoration: underline">Configuration:</h1>
{{-- ajout de poste --}}
    <div class=" mt-5">
        <h3>Tables Poste: </h3>
        <table class="table table-striped table-hover shadow">
            <thead class="bg-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Poste</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($poste as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->poste}}</td> 
                <td>
                    <form action="/poste/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- ajouter role --}}
    <div style="border: solid black 2px" class="p-5">
        <h3>Ajouter un nouveau poste: </h3>
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
        <form action="/poste" method="POST" class="mt-3">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="titre">Poste:</label>
                <input type="text" class="form-control" id="href" name="poste">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning mt-4 mb-4">Ajouter</button>

            </div>
        </form>
    </div>

    {{--  Role --}}

    <div class=" mt-5">
        <h3>Tables Role: </h3>
        <table class="table table-striped table-hover shadow">
            <thead class="bg-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($role as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->role}}</td> 
                <td>
                    <form action="/role/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- ajouter role --}}
    <div style="border: solid black 2px" class="p-5">
        <h3>Ajouter un nouveau role: </h3>
        @if ($errors->role->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->role->all() as $error)
     
                 <li>{{$error}}</li>
                    
                @endforeach
            </ul>
         </div>
         @endif
        <form action="/role" method="POST" class="mt-3">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="titre">Role:</label>
                <input type="text" class="form-control" id="href" name="role">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning mt-4 mb-4">Ajouter</button>

            </div>
        </form>
    </div>


@endsection