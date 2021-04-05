	<!-- Testimonial section -->
	<div class="testimonial-section pb100">
		<div class="test-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<div class="section-title left">
						<h2>{{$homeTitre[1]->titre}}</h2>
					</div>
					<div class="owl-carousel" id="testimonial-slide">
						@foreach ($testimonial as $item)	
							<!-- single testimonial -->
							<div class="testimonial">
								<span>‘​‌‘​‌</span>
								<p>{{$item->texte}}</p>
								<div class="client-info">
									<div class="avatar">
										<img src="{{asset('storage/img/avatar/'.$item->testi_pictures->src)}}" alt="">		
									</div>
									<div class="client-name">
										<h2>{{$item->nom}} {{$item->prenom}}</h2>
										<p>{{$item->company}}</p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial section end-->