@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $school->name }}</div>
                <div class="panel-body">
                    <strong>Anschrift</strong>
                    <br/>
                    {{ $school->street }}
                    <br/>
                    {{ $school->zipcode . ' ' . $school->town }}
                    <br/>
                    <a class="btn -primary" href="{{ url('/school/' . $school->id . '/edit') }}">
                    <i class="fa fa-btn fa-edit"></i>Bearbeiten
                    </a>
                </div>
            </div>
            <div class="panel panel-default">
            	<div class="panel-heading">Aktive Teilnehmer</div>
            	<div class="panel-body">
            		<div class="container">
            			@foreach ($registrations as $registration)
            				<div class="row">
            					<div class="col-md-6 col-md-offset-1">
            						{{ $registration->firstname . ' ' . $registration->surname . ', ' . App\Pupil::enrolmentToGrade($registration->schoolenrolment) . $registration->letter }}
            					</div>
            					<div class="col-md-4">
            						{{ $registration->name . ' ' . $registration->grade }}
            					</div>
            				</div>
            			@endforeach
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection
