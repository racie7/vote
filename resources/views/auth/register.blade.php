@extends('layouts.auth')

@section('content')
    <div class="container">
            <div class="col-md-12 text-center">
                @include('partials.alerts')
                <!--<div class="alert alert-danger">
                    {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                    <strong>Providing inaccurate information will call for disciplinary actions.</strong>
                </div> -->
            </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('KSG E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="national_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('National ID NO.') }}</label>

                                <div class="col-md-6">
                                    <input id="national_id" type="text"
                                           class="form-control @error('national_id') is-invalid @enderror"
                                           name="national_id"
                                           value="{{ old('national_id') }}" required autocomplete="national_id">

                                    @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staff_no"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Staff Number') }}</label>

                                <div class="col-md-6">
                                    <input id="staff_no" type="text"
                                           class="form-control @error('staff_no') is-invalid @enderror" name="staff_no"
                                           value="{{ old('staff_no') }}" required autocomplete="national_id">

                                    @error('staff_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                <div class="col-md-6">
                                    <select name="department" id="department" required autocomplete="department"
                                            class="form-control  @error('department') is-invalid @enderror">
                                        <option selected disabled> -- Select your Department --

                                        </option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" >{{ $department->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="job"--}}
{{--                                       class="col-md-4 col-form-label text-md-right">{{ __('Job Group') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <select name="job" id="job"--}}
{{--                                            class="form-control  @error('job') is-invalid @enderror">--}}
{{--                                        <option selected disabled> -- Select your Job Group --</option>--}}
{{--                                        @foreach($jobGroups as $job)--}}
{{--                                            <option value="{{ $job->id }}">{{ $job->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

{{--                                    @error('job')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="designation"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                                <div class="col-md-6">
                                    <select name="designation" id="designation" required autocomplete="designation"
                                            class="form-control  @error('job') is-invalid @enderror">
                                        <option selected disabled> -- Select your Designation --</option>
                                        @foreach($designations as $designation)
                                            @php($job = $designation->name . ' - ' . $designation->job_group)
                                            <option value="{{ $job }}">
                                                {{ $job }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--							<div class="form-group row">--}}
                            {{--								<label for="job_description"--}}
                            {{--								       class="col-md-4 col-form-label text-md-right">{{ __('Job Description') }}</label>--}}
                            {{--								--}}
                            {{--								<div class="col-md-6">--}}
                            {{--								<textarea id="job_description" --}}
                            {{--									       class="form-control @error('job_description') is-invalid @enderror" name="job_description"--}}
                            {{--										    cols="30" rows="3"  maxlength="250"--}}
                            {{--											placeholder="Please enter your job description.">{{ old('job_description') }}</textarea>--}}
                            {{--								--}}
                            {{--									--}}
                            {{--									@error('job_description')--}}
                            {{--									<span class="invalid-feedback" role="alert">--}}
                            {{--                                        <strong>{{ $message }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--									@enderror--}}
                            {{--								</div>--}}
                            {{--							</div>--}}

                            <div class="form-group row">
                                <label for="campus"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Campus') }}</label>

                                <div class="col-md-6">
                                    <select name="campus" id="campus" required autocomplete="campus"
                                            class="form-control  @error('campus') is-invalid @enderror">
                                        <option selected disabled> -- Select your Campus --</option>
                                        @foreach($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('campus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6" style="padding-top: 10px">
                                    <input type="radio" name="gender" id="gender" value="male" required autocomplete="gender">Male
                                    <input type="radio" name="gender" id="gender" value="female"
                                           style="margin-left: 15px">Female

                                    @error('appointed_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="appointed_at"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Date of Appointment') }}</label>

                                <div class="col-md-6">
                                    <input id="appointed_at" type="date" max="{{ now()->toDateString() }}"
                                           class="form-control @error('appointed_at') is-invalid @enderror"
                                           name="appointed_at" required value="{{ old('appointed_at') }}">

                                    @error('appointed_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="password" placeholder="Minimum 8 characters"
                                           minlength="8">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" minlength="8"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
