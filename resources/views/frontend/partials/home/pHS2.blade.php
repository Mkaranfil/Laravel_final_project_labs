
<div class="overlay"></div>
		<!-- card section -->
		<div class="card-section">
			<div class="container">
				<div class="row">
					@foreach ($serviceListe->random(3) as $item)
                    <!-- single card -->
                    <div class="col-md-4 col-sm-6">
                        <div class="lab-card" style="height: 400px">
                            <div class="icon">
                                <i class="{{$item->icons->name}}"></i>
                            </div>
                            <h2>{{$item->titre}}</h2>
                            <p>{{$item->texte}}</p>
                        </div>
                    </div>
                    <!-- single card -->
                @endforeach
				</div>
			</div>
		</div>
		<!-- card section end-->