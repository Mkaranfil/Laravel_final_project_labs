<!-- Page Preloder -->
<div id="preloder">
    <div class="loader">
        <img src="img/logo.png" alt="">
        <h2>Loading.....</h2>
    </div>
</div>


<!-- Header section -->
<header class="header-section">
    <div class="logo">
        <img src="{{asset('storage/img/'.$logo[0]->src)}}" alt="" height="30px" width="55px"><!-- Logo -->
    </div>
    <!-- Navigation -->
    <div class="responsive"><i class="fa fa-bars"></i></div>
    <nav>
        <ul class="menu-list">
            @foreach ($navbar as $item)
            <li><a href="{{$item->href}}">{{$item->titre}}</a></li>
            @endforeach
            @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/membresLabs') }}" >Profil</a></li>
                    @endauth
            @endif 
        </ul>
    </nav>
</header>
<!-- Header section end -->