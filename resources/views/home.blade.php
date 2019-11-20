@extends('layouts.app')

@section('content')
    <section id="subintro">

        <div class="container">
            <div class="row">
                <div class="span4">
                    <h3>Nomination <strong>Results</strong></h3>
                </div>
                <div class="span8">
                    <ul class="breadcrumb notop">
                        <li><a href="{{ route('upcoming-elections') }}">Upcoming Elections</a>
                            <span class="divider">/</span>
                        </li>
                        <li><a href="{{ route('team-awards.results') }}">Team Awards Nominations</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="maincontent">
        @include('partials.alerts')
        <div class="container">
            @if(auth()->user()->can_view_results)
                <div class="row">
                    <div class="span12">

                        <div class="row">
                            <div class="span12">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs bold">
                                        @foreach($votes as $key => $vote)
                                            <li class="{{ $loop->first ? 'active' : '' }}">
                                                <a href="#{{ $key }}" data-toggle="tab">
                                                    <i class="icon-bar-chart"></i> {{ $vote->type->type }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach($votes as $key => $vote)
                                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $key }}">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>
                                                        <th>
                                                            Nominee Name
                                                        </th>
                                                        <th>
                                                            Nominations
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($vote->votes as $nomination)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if(isset($nomination->candidate))
                                                                    {{ $nomination->candidate->name }}
                                                                @elseif(isset($nomination->team))
                                                                    {{ $nomination->team->name }}
                                                                @endif

                                                            </td>
                                                            <td>
                                                                {{ number_format($nomination->count) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @else
                <div class="row">
                    <div class="span12 text-center">
                        <div class="alert alert-success">
                            <strong>Registration completed successfully. Nominations will take place soon.</strong>
{{--                            <strong>Thank you for participating in these nominations.</strong>--}}
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </section>
@endsection
