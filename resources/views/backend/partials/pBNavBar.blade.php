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
<h1 style="text-decoration: underline">Navbar:</h1>
<div>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Href</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($navbar as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->titre}}</td>
              <td>{{$item->href}}</td>
              <td>
                <a href="navbar/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td>
                <td>
                    <form action="/navbar/{{ $item->id }}" method="POST">
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
    <h3>Ajouter une nouvelle section: </h3>
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
    <form action="/navbar" method="POST" class="mt-3">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="titre">Titre</label>
              <input type="text" class="form-control" id="href" name="titre">
            </div>
            <div class="form-group col-md-6">
              <label for="href">Lien</label>
              <input type="text" class="form-control" id="href" name="href">
            </div>
          </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning mt-4 mb-4">Ajouter</button>

        </div>
    </form>
</div>