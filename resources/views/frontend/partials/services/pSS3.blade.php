	<!-- services card section-->
	<div class="services-card-section spad" id="services-card">
		<div class="container">
			<div class="row">
				@foreach ($serviceCarte as $item)
				<!-- Single Card -->
					<div class="col-md-4 col-sm-6">
						<div class="sv-card">
							<div class="card-img">
								<img src="{{asset('storage/img/'.$item->card_pictures->src)}}" style="height: 250px">
							</div>
							<div class="card-text" style="height: 350px">
								<h2>{{$item->titre}}</h2>
								<p>{{$item->texte}}</p>
							</div>
						</div>
					</div>	
				@endforeach
			</div>
		</div>
	</div>
	<!-- services card section end-->