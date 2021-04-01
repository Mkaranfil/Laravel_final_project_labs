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
    <h1 style="text-decoration: underline">Logo:</h1>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Logo</th>
            <th scope="col">Titre</th>
            <th scope="col"></th>
            <th scope="col"></th>
            {{-- <th scope="col"></th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($logo as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->src}}</td>
              <td>{{$item->titre}}</td>
              <td>
                <a href="logo/{{ $item->id }}/edit" class="btn btn-warning mb-2">Edit</a>
              </td> 
              <td>
                <a href="/logo/{{$item->id}}" class="btn btn-warning">SHOW</a>
                </td>
                {{-- <td>
                    <form action="/logo/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>    --}}
            </tr>
            @endforeach
        </tbody>
      </table>
</div>

<div>
    <h1 style="text-decoration: underline">Sout-titre:</h1>
    <h3>Tables: </h3>
    <table class="table table-striped table-hover shadow">
        <thead class="bg-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">sous-titre</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($logoTitre as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->titre}}</td>
              <td>
                <a href="logoTitre/{{$item->id}}/edit" class="btn btn-warning mb-2">Edit</a>
              </td> 
                <td>
                    <form action="/logoTitre/{{ $item->id }}" method="POST">
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
{{-- ajouter sous-titre logo --}}
<div style="border: solid black 2px" class="p-5">
    <label for="">Ajouter un nouveau sous-titre:</label>
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
    <form action="/logoTitre" method="POST" class="mt-3">
        @csrf
        <div class="">
            <div class="form-group">
              <label for="titre">nouveau sous-titre</label>
              <input type="text" class="form-control" id="href" name="titre">
            </div>
        <div >
            <button type="submit" class="btn btn-warning">Ajouter</button>

        </div>
    </form>
</div>