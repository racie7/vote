@extends('layouts.app')

@section('content')
	<section id="subintro">
		
		<div class="container">
			<div class="row">
				<div class="span4">
					<h3><strong>Nominations</strong></h3>
				
				</div>
				<div class="span8">
					<ul class="breadcrumb notop">
						<li><a href="#">Home</a><span class="divider">/</span></li>
						<li class="active">Nominations</li>
					</ul>
				</div>
			</div>
		</div>
	
	</section>
	<div class="container">
		@include('partials.alerts')
		<div class="row">
			<div class="span12">
				<h4>Individual Award</h4>
				<label style="color:black"><strong>Eligibility Criteria:</strong></label>
				<p style="color:black">To qualify for an individual nomination, candidates must meet the following
					requirements:</p>
				<ol>
					<li style="color:black">Must be a member of staff who has worked continuously for a period of one
						year.
					</li>
					<li style="color:black">Has demonstrated professional excellence in service delivery.</li>
					<li style="color:black">Serving in any cadre within the school at the time of nomination.</li>
					<li style="color:black">Maintained excellent performance appraisal score.</li>
					<li style="color:black">Is not subject of an ongoing discipline case.</li>
				</ol>
				<br> <br>
				<!-- start: Accordion -->
				<div class="accordion " id="accordion2">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2"
							   href="#collapseOne" style="font-size:16px">
								<i class="icon-plus"></i> Campus Employee of the Year</a>
						</div>
						<div id="collapseOne" class="accordion-body in collapse">
							<div class="accordion-inner">
								<p style="color:black"><strong>THIS NOMINATION WILL BE AVAILABLE AT QUARTER
										FOUR</strong></p>
								<p style="color:black"><strong>Nominee Type:</strong>This category is open for
									individual nominations.</p>
								<p style="color:black"><strong>Award Description:</strong> This award recognizes an
									individual who has promoted and upheld
									integrity as provided in chapter six of the Constitution, values and principles in
									Article 232 and National Values in Article 10 and KSG Values. The officer must also
									have made a significant impact on service delivery in the provision of efficient,
									effective and quality services.</p>
								<label style="color:black"><strong>Criteria:</strong></label>
								<ol>
									<li style="color:black">Must have been an employee of the nominating campus for one
										continuous year in the year of nomination.
									</li>
									<li style="color:black">Demonstrated the criteria defined in part 4:
										<ul>
											<li style="color:black">Outstanding Customer Service</li>
											<li style="color:black">Creativity and Innovation</li>
											<li style="color:black">Teamwork</li>
											<li style="color:black">Leadership Abilities</li>
											<li style="color:black">Empathy and Support for others</li>
											<li style="color:black">Community Involvement</li>
										</ul>
									</li>
									<li style="color:black">Demonstrated improved access to, as well as the delivery of
										service in the campus
									</li>
									<li style="color:black">Positively influenced change in colleague’s perception while
										improving transparency in delivery of service.
									</li>
								</ol>
								<br>
								@if(!request()->has('_preview'))
									@include('partials.nomination-form')
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Accordion -->
		</div>
	</div>
@endsection