<!-- Intro Section -->
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-center">
            <img src="{{asset('storage/img/'.$logo[0]->src)}}" alt="" height="200px" width="550px">
            @foreach ($logoTitre as $item)
                <p>{{$item->titre}}</p>    
            @endforeach
        </div>
    </div>
    <!-- slider -->
    <div id="hero-slider" class="owl-carousel">
        @foreach ($carousel as $item)
        <div class="item  hero-item" data-bg="{{asset('storage/img/'.$item->src)}}"></div>      
        @endforeach
    
    </div>
</div>
<!-- Intro Section -->