@extends('layouts.app')

@section('content')
    <section id="subintro">

        <div class="container">
            <div class="row">
                <div class="span4">
                    <h3>Reset <strong>Password</strong></h3>
                </div>
                <div class="span8">
                    <ul class="breadcrumb notop">
                        <li><a href="{{ route('home') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        @include('partials.alerts')
        <div class="row">
            <div class="span12">
                <!-- start: Accordion -->
                <div class="accordion " id="accordion2">
                    <div class="accordion-group">
                        <div id="collapseOne" class="accordion-body in collapse">
                            <div class="accordion-inner">
                                <form style="color:black" action="{{ route('update-user-password') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <span class="required">*</span><strong>Staff Number:</strong><br>
                                        <input type="text" name="staff_number" autofocus
                                               placeholder="Enter staff number" required>
                                    </div>

                                    <div class="form-group">
                                        <span class="required">*</span><strong>New Password:</strong><br>
                                        <input type="password" name="password" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <span class="required">*</span><strong>Confirm Password:</strong><br>
                                        <input type="password" name="password_confirmation" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm"><strong>Update User
                                                Password</strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Accordion -->
        </div>
    </div>
@endsection
