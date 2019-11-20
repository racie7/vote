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
								<i class="icon-plus"></i> Values Champion Award</a>
						</div>
						<div id="collapseOne" class="accordion-body in collapse">
							<div class="accordion-inner">
								<p style="color:black"><strong>Nominee Type:</strong>This category is open for
									individual nominations.</p>
								<p style="color:black"><strong>Award Description:</strong> The award will recognize an
									individual in the campus who has promoted and
									upheld integrity as provided in chapter six of the Constitution, values, and
									principles in Article 232 and
									National Values in Article 10 and KSG Values.
								</p>
								<label style="color:black"><strong>Criteria:</strong></label>
								<ol style="color:#000000">
									<li>Must have been an employee of the nominating campus for one continuous year in
										the year of nomination.
									</li>
									<li>Should be acknowledged by colleagues as a person of integrity whose character is
										beyond reproach.
									</li>
									<li>Must be a respectable, well groomed person who promotes public confidence in the
										office.
									</li>
									<li>Is an honest and selfless individual who will go beyond call duty to achieve set targets.</li>
                                    <li>Is responsive to deliver excellent and timely results.</li>
									<li>An individual that is time conscience and a team player and treats others with courtesy.</li>
								</ol>
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