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
    <h1 style="text-decoration: underline">Liste des Articles:</h1>
    <div>
        <h3>Article Verifie: </h3>
        <table class="table table-striped table-hover shadow">
            <thead class="bg-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($article as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->titre }}</td>
                            <td>
                                {{$item->users->nom}}   {{$item->users->prenom}}
                            </td>
                        <td>
                            <a href="blogArticle/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
                        </td>
                        <td>
                            <a href="/showBo/{{ $item->id }}" class="btn btn-warning">SHOW</a>
                        </td>
                        <td>
                            <form action="/blogArticle/{{ $item->id }}" method="POST">
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
    {{-- Artcile non validee --}}
    <div>
        <h3>Article a verifier: </h3>
        <table class="table table-striped table-hover shadow">
            <thead class="bg-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articleNonValide as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->titre }}</td>
                        <td>
                            {{$item->users->nom}} {{$item->users->prenom}}
                        </td>
                        <td>
                            <a href="/showBo/{{ $item->id }}" class="btn btn-warning">SHOW</a>
                        </td>
                        <td>
                            <form action="/valider/{{ $item->id }}">
                                @csrf
                                <button type="submit" class="btn btn-success">VALIDER</button>
                            </form>
                        </td>
                        <td>
                            <form action="/blogArticle/{{ $item->id }}" method="POST">
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
    {{-- ajouter --}}
    <div style="border: solid black 2px" class="p-5">
        <h3>Ajouter un Article: </h3>
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
        <form action="/blogArticle" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Titre:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="titre" value="{{ old('titre') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Categorie:</label>
                    <select class="form-control" name="categorie_id" id="">
                        @foreach ($categorie as $item)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tags:</label>
                    @foreach ($tag as $item)
                        <div>
                            <label for="text">{{ $item->tag }} </label>
                            <input type="checkbox" name="tag[]" id="" value="{{ $item->id }}">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group mt-2">
                <label for="href">Une image de couverture:</label>
                <input type="file" id="href" name="src">
            </div>
            <div class="mt-4">
                <label class="mr-3" for="titre">Texte:</label> <br>
                <textarea name="texte" id="" cols="120" rows="15">{{ old('texte') }}</textarea><br>
                <span>HTML: Ajoutez le code {{ $br }} pour retourner a la ligne</span>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning mt-4 mb-4">Ajouter</button>

            </div>

        </form>
    </div>
@endsection
