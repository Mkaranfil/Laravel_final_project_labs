<!-- features section -->
<div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{{$serviceTitre[1]->titre}}</h2>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 features">
                @foreach ($serviceSmart as $item)
                    @if ($loop->iteration <= 3)
                        <div class="icon-box light left">
                            <div class="service-text">
                                <h2>{{$item->titre}}</h2>
                                <p>{{$item->texte}}</p>
                            </div>
                            <div class="icon">
                                <i class="{{$item->icons->name}}"></i>
                            </div>
                        </div>
                    @endif
                    @if ($loop->iteration == 3)
                        </div>
                                <!-- Devices -->
                        <div class="col-md-4 col-sm-4 devices">
                            <div class="text-center">
                                <img src="img/device.png" alt=""> 
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 features">
                    @endif
                    @if ($loop->iteration > 3)
                        <div class="icon-box light">
                            <div class="icon">
                                <i class="{{$item->icons->name}}"></i>
                            </div>
                            <div class="service-text">
                                <h2>{{$item->titre}}</h2>
                                <p>{{$item->texte}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="text-center mt100">
            <a href="/blog" class="site-btn">GO BLOG</a>
        </div>
    </div>
</div>
<!-- features section end-->
