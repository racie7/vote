@extends('layouts.app')
@push('styles')
	<style type="text/css">
		select {
			width: 150px;
			margin: 10px;
		}
		select:focus {
			min-width: 150px;
			width: auto;
		}
	</style>
@endpush
@section('content')
	<section id="subintro">
		
		<div class="container">
			<div class="row">
				<div class="span4">

				
				</div>
				<div class="span8">
					<ul class="breadcrumb notop">
						<li><a href="{{ route('index') }}">Home</a><span class="divider">/</span></li>
						<li class="active">FAQs</li>
					</ul>
				</div>
			</div>
		</div>
	
	</section>
	<div class="container">
		<div class="row">
			<div class="span12">
				<h4 style="color:black">Frequently Asked Questions</h4> <br> <br>
				<!-- start: Accordion -->
				<div class="accordion" id="accordion2">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
							   href="#collapseOne">
								<i class="icon-plus"></i>After how long are the nominations done?</a>
						</div>
						<div id="collapseOne" class="accordion-body collapse">
							<div class="accordion-inner">
								<p style="color:black">Nominations are done after every quarter. Only the campus
									employee of the year award and the school employee of the
									year award are done on quarter four.
								</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3"
							   href="#collapseThree">
								<i class="icon-plus"></i> Are the nominations only open to permanent KSG employees?</a>
						</div>
						<div id="collapseThree" class="accordion-body collapse">
							<div class="accordion-inner">
								<p style="color:black">
									The awards will include all members of staff at the school both permanent with
									pension and staff on contract however limited to staff in KSG 4-14.
								</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4"
							   href="#collapseFour">
								<i class="icon-plus"></i>Can I nominate myself?</a>
						</div>
						<div id="collapseFour" class="accordion-body collapse">
							<div class="accordion-inner">
								<p style="color:black">No, you cannot.</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion5"
							   href="#collapseFive">
								<i class="icon-plus"></i>Can I nominate my team?</a>
						</div>
						<div id="collapseFive" class="accordion-body collapse">
							<div class="accordion-inner">
								<p style="color:black">No, you cannot.</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion6"
							   href="#collapseSix">
								<i class="icon-plus"></i>Are the teams limited to the cluster provided?</a>
						</div>
						<div id="collapseSix" class="accordion-body collapse">
							<div class="accordion-inner">
								<p style="color:black">You can only vote for the teams in the cluster provided.</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion7"
							   href="#collapseSeven">
								<i class="icon-plus"></i>Is it mandatory to participate in the nominations?</a>
						</div>
						<div id="collapseSeven" class="accordion-body collapse">
							<div class="accordion-inner">
								<p style="color:black">Yes, it is.</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion8"
							   href="#collapseEight">
								<i class="icon-plus"></i>What kind of evidence should be provided?</a>
						</div>
						<div id="collapseEight" class="accordion-body collapse">
							<div class="accordion-inner">
								<p style="color:black">
									This evidence / supporting material may take the form of written testimonies
									by colleagues / supervisors demonstrating detailing the achievement.
								</p>
							</div>
						</div>
					</div>
				</div>
				<!--end: Accordion -->
			</div>
		</div>
	</div>
	{{--<div class="container">--}}
		{{--<div class="row">--}}
			{{--<div class="col text-center">--}}
				{{--<button class="btn btn-success btn-lg"><strong>SUBMIT</strong></button>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
@endsection