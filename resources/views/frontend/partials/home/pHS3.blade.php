<!-- About contant -->
<div class="about-contant">
    <div class="container">
        <div class="section-title">
            <h2>{{ $homeTitre[0]->titre }}</h2>
        </div>
        <div class="row">
            @foreach ($para as $item)
                <div class="col-md-6">
                    <p>{{ $item->texte }}</p>
                </div>
                @if ($loop->iteration % 2 == 0)
                </div>
                <div class="row">
                @endif
            @endforeach
        </div>
        <div class="text-center mt60">
            <a href="#team-section" class="site-btn">Browse</a>
        </div>
        <!-- popup video -->
        <div class="intro-video">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <img src="img/video.jpg" alt="">
                    <a href="{{$video[0]->lien}}" class="video-popup">
                        <i class="fa fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
