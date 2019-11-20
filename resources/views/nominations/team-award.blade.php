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
				<h4 style="color:black">Team Award</h4>
				<label style="color:black"><strong>Eligibility Criteria:</strong></label>
				<p style="color:black">To consist of a team nomination, the team must meet the following
					qualifications:</p>
				<ol>
					<li style="color:black">Must consist of employees of the school having served for a period of one
						year.
					</li>
					<li style="color:black">Demonstrate professional excellence in service delivery as a team.</li>
				</ol>
				<br> <br>
				<!-- start: Accordion -->
				<div class="accordion" id="accordion2">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2"
							   href="#collapseOne" style="font-size:16px">
								<i class="icon-plus"></i> Team Award</a>
						</div>
						<div id="collapseOne" class="accordion-body in collapse">
							<div class="accordion-inner">
								<p style="color:black"><strong>Nominee Type:</strong>This category is open for team
									nominations.</p>
								<p style="color:black"><strong>Award Description:</strong>A team refers to a group of
									individuals,
									units/ departments.</p>
								<label style="color:black"><strong style="font-size:16px">Criteria:</strong></label>
								<ol>
									<li style="color:black">Must fall within the definition of a team as stated above.
									</li>
									<li style="color:black">Every campus at the school will award this category</li>
									<li style="color:black">Demonstrate the criteria defined as follows.
									 <ul>
									 <li style="color:black">Outstanding Customer Service</li>
									 <li style="color:black">Creativity and Innovation</li>
									 <li style="color:black">Teamwork</li>
									 <li style="color:black">Leadership Abilities </li>
									 <li style="color:black">Empathy and Support for others</li>
									 <li style="color:black">Community Involvement</li>
									 </ul>
									</li>	
								</ol>
								<br>
								<label style="color:black"><span class="required">*</span><strong style="font-size:16px">Select a team:</strong></label>
								<form style="color:black" action="{{ route('team-awards') }}" method="post">
									@csrf
									<div class="form-group">
										<select class="custom-select" name="user" id="inputGroupSelect02">
		                              
											@foreach($teams as $team)
												<option value="{{ $team->id }}">{!! $team->name !!}</option>
											@endforeach
										</select>
									</div>
									<div class="radio-label-vertical-wrapper">
										<div class="form-group" style="color:black">
											<span class="required">*</span><strong>
                                                Excellence:</strong> On a Scale of 1 to 5, how would you rate the team with respect
                                                to meeting your expected timelines to deliver services.
											<br> <br>
											@foreach($ratings as $key => $rating)
												<label class="radio-label-vertical">
													<input type="radio"
													       {{ $key == 4 ? 'checked' : '' }} name="customer_service_rating"
													       value="{{ $key }}" required>{{ $key }}
													({{ $rating }})
												</label>
											@endforeach
										</div>
									</div>
									<!-- <div class="form-group" style="color:black">
										<label for="exampleFormControlTextarea1">
											<span class="required">*</span><strong>Why? (maximum 250
												words)</strong></label>
										<textarea class="form-control" style="min-width: 80%" rows="10"
										          name="customer_service" required
										          maxlength="250"
										          placeholder="Provide evidence why this team should be nominated in regards to Outstanding Customer Service"
										>{{ old('customer_service', \Illuminate\Support\Str::random()) }}</textarea>
									</div> -->
									<div class="radio-label-vertical-wrapper">
										<div class="form-group" style="color:black">
											<span class="required">*</span><strong>
                                                Innovation and Creativity:</strong>  On a Scale of 1 to 5 how you rate the team in developing innovative and
                                                creative approaches to enhance work delivery in the School.<br> <br>
											@foreach($ratings as $key => $rating)
												<label class="radio-label-vertical">
													<input type="radio"
													       {{ $key == 4 ? 'checked' : '' }} name="creativity_innovation_rating"
													       value="{{ $key }}" required>{{ $key }}
													({{ $rating }})
												</label>
											@endforeach
										</div>
									</div>
									<!-- <div class="form-group" style="color:black">
										<label for="exampleFormControlTextarea1"><span class="required">*</span><strong>Why?
												(maximum 250
												words)</strong></label>
										<textarea class="form-control" style="min-width: 80%" rows="10"
										          name="creativity_innovation" required
										          maxlength="250"
										          placeholder="Provide evidence why this team should be nominated in regards to Creativity and Innovation"
										>{{ old('creativity_innovation', \Illuminate\Support\Str::random()) }}</textarea>
									</div> -->
									<div class="radio-label-vertical-wrapper">
										<div class="form-group" style="color:black">
											<span class="required">*</span><strong>Measurable Success:</strong>  On a Scale of 1 to 5, how would you rate the
                                                team in achieving their functional role in your Campus.
											<br> <br>
											@foreach($ratings as $key => $rating)
												<label class="radio-label-vertical">
													<input type="radio" name="teamwork_rating"
													       {{ $key == 4 ? 'checked' : '' }} value="{{ $key }}"
													       required>{{ $key }} ({{ $rating }}
													)
												</label>
											@endforeach
										</div>
									</div>
									<!-- <div class="form-group" style="color:black">
										<label for="exampleFormControlTextarea1"><span class="required">*</span>
											<strong>Why? (maximum 250 words)</strong></label>
										<textarea class="form-control" style="min-width: 80%" rows="10" name="teamwork"
										          required maxlength="250"
										          placeholder="Provide evidence why this team should be nominated in regards to Teamwork"
										>{{ old('teamwork', \Illuminate\Support\Str::random()) }}</textarea>
									</div> -->
									
									<div class="radio-label-vertical-wrapper">
										<div class="form-group" style="color:black">
											<span class="required">*</span><strong>Professionalism:</strong>On a Scale of 1 to 5, how would rate the team
                                                in consistently meeting or exceeding challenging objectives and exhibiting
                                                honesty and integrity in service delivery.<br> <br>
											@foreach($ratings as $key => $rating)
												<label class="radio-label-vertical">
													<input type="radio"
													       {{ $key == 4 ? 'checked' : '' }} name="ability_leadership_rating"
													       value="{{ $key }}" required>{{ $key }}
													({{ $rating }})
												</label>
											@endforeach
										</div>
									</div>
									<!-- <div class="form-group" style="color:black">
										<label for="exampleFormControlTextarea1"><span class="required">*</span><strong>Why?
												(maximum 250 words)</strong></label>
										<textarea class="form-control" style="min-width: 80%" rows="10"
										          name="ability_leadership" required
										          maxlength="250"
										          placeholder="Provide evidence why this team should be nominated in regards to Leadership Abilities"
										>{{ old('ability_leadership_rating', \Illuminate\Support\Str::random()) }}</textarea>
									</div>
									<div class="radio-label-vertical-wrapper">
										<div class="form-group" style="color:black">
											<span class="required">*</span>On a scale of 1 to 5, how would you
                                                rate this team on Empathy and Support for others?<br> <br>
											@foreach($ratings as $key => $rating)
												<label class="radio-label-vertical">
													<input type="radio"
													       {{ $key == 4 ? 'checked' : '' }} name="empathy_support_rating"
													       value="{{ $key }}" required>{{ $key }}
													({{ $rating }})
												</label>
											@endforeach
										</div>
									</div>
									 <div class="form-group" style="color:black">
										<label for="exampleFormControlTextarea1"><span class="required">*</span><strong>Why?
												(maximum 250 words)</strong></label>
										<textarea class="form-control" style="min-width: 80%" rows="10"
										          name="empathy_support" required
										          maxlength="250"
										          placeholder="Provide evidence why this team should be nominated in regards to Empathy and Support for others"
										>{{ old('empathy_support', \Illuminate\Support\Str::random()) }}</textarea>
									</div>
									<<div class="radio-label-vertical-wrapper">
										<div class="form-group" style="color:black">
											<span class="required">*</span>On a scale of 1 to 5, how would you
                                                rate this team on Teamwork?<br> <br>
											
											@foreach($ratings as $key => $rating)
												<label class="radio-label-vertical">
													<input type="radio"
													       {{ $key == 4 ? 'checked' : '' }} name="community_involvement_rating"
													       value="{{ $key }}" required>{{ $key }}
													({{ $rating }})
												</label>
											@endforeach
										</div>
									</div> -->
									
									
									
									<div class="form-group" style="color:black">
										<label for="exampleFormControlTextarea1">
										<span class="required">*</span><strong style="font-size:16px">Based on your ratings above, 
			                            justify with reasons for rating your team on: (maximum of 500 words)</strong>
										<ol style="font-size:16px">
										    <li>Excellence</li>
											<li> Innovation and Creativity</li>
											<li>Measurable Success</li>
											<li> Professionalism</li>
										</ol>
										</label>
										<textarea class="form-control" style="min-width: 80%" rows="10"
										          name="community_involvement" required
										          maxlength="250"
										          placeholder="Provide evidence why this person should be nominated in regards to Community Involvement"
										>{{ old('community_involvement', \Illuminate\Support\Str::random()) }}</textarea>
									</div>
									
									<div class="container">
										<div class="row">
											<div class="col-md-6 offset-md-3 text-center">
												<button type="submit" class="btn btn-success btn-lg">
													<strong>Submit</strong></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--end: Accordion -->
			</div>
		</div>
	</div>
@endsection