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
	
	<section id="maincontent">
		<div class="container">
			<div class="row">
				<div class="span12">
					<!-- Default table -->
					<div class="row">
						<div class="span12">
							<h4 class="heading"><strong>Available Users</strong><span></span></h4>
							<table class="table table-bordered">
								<thead>
								<tr>
									<th width="2%" class="text-center">
										#
									</th>
									<th>
										Name
									</th>
									<th>
										Staff Number
									</th>
									<th class="text-center">
										Action
									</th>
								</tr>
								</thead>
								<tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->staff_no }}</td>
                                    <td class="text-center">
                                        @if(auth()->id() == $user->id)
                                        <a class="btn btn-info" disabled>It's You</a>
                                        @else
                                        <a href="{{ route('nominations', [
												'slug' => $nextRoute,
												'_id' => $user->id,
												'_name' => $user->name,
												'_has-user' => true
											]) }}" class="btn btn-primary">Nominate User</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $users->appends($_GET)->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection