<!-- Team Section -->
<div class="team-section spad" id="team-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2>{{ $homeTitre[3]->titre }}</h2>
        </div>
        <div class="row">
            @foreach ($users->where('poste_id', '!=', 1)->random(2) as $item)
                <!-- single member -->
                <div class="col-sm-4">
                    <div class="member">
                        <img height="400" width="90%" src="{{asset('storage/img/users/'.$item->user_pictures->src)}}"alt="">
                        <h2>{{$item->nom}} {{$item->prenom}}</h2>
                        <h3>{{$item->postes->poste}}</h3>
                    </div>
                </div>
                @if ($loop->iteration == 1)
                    <div class="col-sm-4">
                        <div class="member">
                            <img height="400" width="90%" src="{{asset('storage/img/users/'.$users[0]->user_pictures->src)}}" alt="">
                            <h2>{{$users[0]->nom}} {{$users[0]->prenom}}</h2>
                            <h3>{{$users[0]->postes->poste}}</h3>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Team Section end-->
{{-- ligne separation --}}
<div class="promotion-section"></div>
{{-- ligne separation end --}}
