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
        <div class="item  hero-item" data-bg="img/01.jpg"></div>
        <div class="item  hero-item" data-bg="img/02.jpg"></div>
    </div>
</div>
<!-- Intro Section -->