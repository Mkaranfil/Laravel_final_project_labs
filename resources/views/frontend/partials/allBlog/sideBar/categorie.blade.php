<!-- Single widget -->
<div class="widget-item">
    <h2 class="widget-title">Categories</h2>
    <ul>
        @foreach ($categorie as $item)
            <li><a href="#">{{$item->nom}}</a></li>
        @endforeach
    </ul>
</div>