<!-- Single widget -->
<div class="widget-item">
    <h2 class="widget-title">Categories</h2>
    <ul>
        @foreach ($categorie as $cat)
                <li><a href="/filtreCategorie/{{$cat->id}}">{{$cat->nom}}</a></li>
        @endforeach
    </ul>
</div>