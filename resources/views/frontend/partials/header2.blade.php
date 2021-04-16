@if (Route::getCurrentRoute()->uri() != '/')
		<!-- Page header -->
		<div class="page-top-section">
			<div class="overlay"></div>
			<div class="container text-right">
				<div class="page-info">
					<h2 class="text-capitalize">Blog</h2>
					<div class="page-links">
						<a href="/">Home</a>
						<span class="text-capitalize">Blog</span>
					</div>
				</div>
			</div>
		</div>
		<!-- Page header end-->
	@endif