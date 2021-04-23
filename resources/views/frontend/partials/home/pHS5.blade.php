	<!-- Services section -->
	<div class="services-section spad">
		<div class="container">
			<div class="section-title dark">
				<h2>{!! App\Helper\Color::green($homeTitre[2]->titre)!!}</h2>
			</div>
			<div class="row">
				@foreach ($serviceListe->random(9) as $item)
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="{{$item->icons->name}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$item->titre}}</h2>
							<p>{{$item->texte}}</p>
						</div>
					</div>
				</div>
				@if ($loop->iteration % 3 == 0)
                </div>
                <div class="row">
                @endif
				@endforeach
			</div>
			<div class="text-center">
				<a href="/services" class="site-btn">GO SERVICE</a>
			</div>
		</div>
	</div>
	<!-- services section end -->