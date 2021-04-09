<!-- Single widget -->
<div class="widget-item">
    <h2 class="widget-title">Tags</h2>
    <ul class="tag">
        @foreach ($tag as $item)
             <li><a href="">{{$item->tag}}</a></li>
        @endforeach
    </ul>
</div>