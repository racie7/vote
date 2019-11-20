@extends('layouts.app')

@section('content')
	<section id="subintro">
		
		<div class="container">
			<div class="row">
				<div class="span4">
					<h3>Upcoming <strong>Nominations</strong></h3>
				</div>
				<div class="span8">
					<ul class="breadcrumb notop">
						<li><a href="{{ route('home') }}">Home</a><span class="divider">/</span></li>
						<li class="active">Upcoming Nominations</li>
					</ul>
				</div>
			</div>
		</div>
	
	</section>
	<section id="maincontent">
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="row">
						<div class="span12">
							<table class="table">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Election Type
									</th>
									<th>
										Period
									</th>
									<th>
										Action
									</th>
								</tr>
								</thead>
								<tbody>
								@foreach($elections as $election)
									<tr>
										<td>
											{{ $loop->iteration }}
										</td>
										<td>
											{{ $election->type->type }}
										</td>
										<td>
											{{ $election->period }}
										</td>
										<td>
											<a href="{{ route('nominations', [
												'slug' => $election->type->slug,
												'_preview' => true,
											]) }}" class="btn btn-primary">Preview Election</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection