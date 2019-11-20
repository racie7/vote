@if(!request()->has('_has-user'))
	<form style="color:black" action="{{ route('search-nominee') }}">
		<input type="hidden" name="_next" value="{{ $slug }}">
		<div class="form-group">
			<span class="required">*</span><strong>Nominees's name:</strong><br>
			<input type="text" name="name" placeholder="Search your nominee by Surname" required>
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn btn-success btn-sm"><strong>Search</strong>
			</button>
		</div>
	</form>
@else
	<form style="color:black" action="{{ route('process-nominations') }}" method="post">
		<input type="hidden" name="election" value="{{ $election->id }}">
		<input type="hidden" name="user" value="{{ request()->query('_id') }}">
		<input type="hidden" name="slug" value="{{ $slug }}">
		@csrf
		<div class="form-group">
			<strong>Nominees's name:</strong><br>
			<input type="text"  value="{{ request()->query('_name') }}" disabled>
		</div>
		<div class="radio-label-vertical-wrapper">
			<div class="form-group" style="color:black">
				<span class="required">*</span><strong>
					On a scale of 1 to 5, how would you rate your nominee on Outstanding Customer Service?</strong>
				<br> <br>
				@foreach($ratings as $key => $rating)
					<label class="radio-label-vertical">
						<input type="radio" name="customer_service_rating"
						       value="{{ $key }}" required>{{ $key }}
						({{ $rating }})
					</label>
				@endforeach
			</div>
		</div>
		<!-- <div class="form-group" style="color:black">
			<label for="exampleFormControlTextarea1">
				<span class="required">*</span><strong>Why? (maximum 250 words)</strong></label>
			<textarea class="form-control" style="min-width: 80%" rows="10" name="customer_service" required
			          maxlength="250"
			          placeholder="Please give your evidence to match your rating above."
			>{{ old('customer_service')}}</textarea>
		</div> -->
		<div class="radio-label-vertical-wrapper">
			<div class="form-group" style="color:black">
				<span class="required">*</span><strong>On a scale of 1 to 5, how would you rate your nominee on
					Creativity and
					Innovation?</strong><br> <br>
				@foreach($ratings as $key => $rating)
					<label class="radio-label-vertical">
						<input type="radio" name="creativity_innovation_rating"
						       value="{{ $key }}" required>{{ $key }}
						({{ $rating }})
					</label>
				@endforeach
			</div>
		</div>
		<!-- <div class="form-group" style="color:black">
			<label for="exampleFormControlTextarea1"><span class="required">*</span><strong>Why? (maximum 250
					words)</strong></label>
			<textarea class="form-control" style="min-width: 80%" rows="10" name="creativity_innovation" required
			          maxlength="250"
			          placeholder="Please give your evidence to match your rating above."
			>{{ old('creativity_innovation') }}</textarea>
		</div> -->
		<div class="radio-label-vertical-wrapper">
			<div class="form-group" style="color:black">
				<span class="required">*</span><strong>On a scale of 1 to 5, how would you rate your nominee on
					Teamwork?</strong>
				<br> <br>
				@foreach($ratings as $key => $rating)
					<label class="radio-label-vertical">
						<input type="radio" name="teamwork_rating" value="{{ $key }}"
						       required>{{ $key }} ({{ $rating }}
						)
					</label>
				@endforeach
			</div>
		</div>
		<!-- <div class="form-group" style="color:black">
			<label for="exampleFormControlTextarea1"><span class="required">*</span>
				<strong>Why? (maximum 250 words)</strong></label>
			<textarea class="form-control" style="min-width: 80%" rows="10" name="teamwork" required maxlength="250"
			          placeholder="Provide evidence why this person should be nominated in regards to Teamwork"
			>{{ old('teamwork') }}</textarea>
		</div> -->
		
		<div class="radio-label-vertical-wrapper">
			<div class="form-group" style="color:black">
				<span class="required">*</span><strong>On a scale of 1 to 5, how would you
					rate
					your nominee on Leadership Abilities?</strong><br> <br>
				@foreach($ratings as $key => $rating)
					<label class="radio-label-vertical">
						<input type="radio" name="ability_leadership_rating"
						       value="{{ $key }}" required>{{ $key }}
						({{ $rating }})
					</label>
				@endforeach
			</div>
		</div>
		<!-- <div class="form-group" style="color:black">
			<label for="exampleFormControlTextarea1"><span class="required">*</span><strong>Why?
					(maximum 250 words)</strong></label>
			<textarea class="form-control" style="min-width: 80%" rows="10" name="ability_leadership" required
			          maxlength="250"
			          placeholder="Please give your evidence to match your rating above."
			>{{ old('ability_leadership_rating')}}</textarea>
		</div> -->
		<div class="radio-label-vertical-wrapper">
			<div class="form-group" style="color:black">
				<span class="required">*</span><strong>On a scale of 1 to 5, how would you
					rate
					your nominee on Empathy and Support for others?</strong><br> <br>
				@foreach($ratings as $key => $rating)
					<label class="radio-label-vertical">
						<input type="radio" name="empathy_support_rating"
						       value="{{ $key }}" required>{{ $key }}
						({{ $rating }})
					</label>
				@endforeach
			</div>
		</div>
		<!-- <div class="form-group" style="color:black">
			<label for="exampleFormControlTextarea1"><span class="required">*</span><strong>Why?
					(maximum 250 words)</strong></label>
			<textarea class="form-control" style="min-width: 80%" rows="10" name="empathy_support" required
			          maxlength="250"
			          placeholder="Please give your evidence to match your rating above."
			>{{ old('empathy_support')}}</textarea>
		</div> -->
		<div class="radio-label-vertical-wrapper">
			<div class="form-group" style="color:black">
				<span class="required">*</span><strong>On a scale of 1 to 5, how would you
					rate
					your nominee on Community Involvement?</strong><br> <br>
				
				@foreach($ratings as $key => $rating)
					<label class="radio-label-vertical">
						<input type="radio"  name="community_involvement_rating"
						       value="{{ $key }}" required>{{ $key }}
						({{ $rating }})
					</label>
				@endforeach
			</div>
		</div>
		<div class="form-group" style="color:black">
			<label for="exampleFormControlTextarea1">
			<span class="required">*</span><strong style="font-size:16px">Based on your ratings above, 
			justify with reasons for rating your nominee on: (maximum of 500 words)</strong>
			<ol style="font-size:16px">
				<li>Outstanding Customer Service</li>
				<li>Creativity and Innovation</li>
				<li>Teamwork</li>
				<li> Leadership Abilities</li>
				<li>Empathy and Support for others</li>
				<li>Community Involvement</li>
			</ol>
			</label>
			<textarea class="form-control" style="min-width: 80%" rows="10" name="community_involvement" required
			          maxlength="250"
			          placeholder="Please give your evidence to match your ratings above."
			>{{ old('community_involvement')}}</textarea>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
					<button type="submit" class="btn btn-success btn-lg"><strong>Next</strong></button>
				</div>
			</div>
		</div>
	</form>
@endif